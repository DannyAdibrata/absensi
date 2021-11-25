<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Rayon;
use App\Models\Rombel;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absen = Absen::latest()->paginate(5);

        return view('absen.index',compact('absen'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rombel=Rombel::get();
        $rayon=Rayon::get();

        return view('absen.create',compact('rayon','rombel'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis'=>'required',
            'jam_keberangkatan'=>'required',
            'jam_kepulangan'=>'required',
            'keterangan'=>'required'
        ]);

        Absen::create($request->all());
        return redirect()->route('absen.index')
                        ->with('success','Berhasil Menyimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(Absen $absen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(Absen $absen)
    {
        $rombel=Rombel::get();
        $rayon=Rayon::get();

        return view('absen.edit',compact('rayon','rombel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absen $absen)
    {
        $request->validate([
            'nis'=>'required',
            'jam_keberangkatan'=>'required',
            'jam_kepulangan'=>'required',
            'keterangan'=>'required'
        ]);

        $absen->update($request->all());
        return redirect()->route('absen.index')
                        ->with('success','Berhasil Mengubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absen $absen)
    {
        $absen->delete();

        return redirect()->route('absen.index')
                        ->with('success','Berhasil Hapus !');
    }
}
