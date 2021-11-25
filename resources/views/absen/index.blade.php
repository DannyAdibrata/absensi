@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Absen</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('absen.create') }}"> Create</a>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Jam Kedatangan</th>
            <th>Jam Kepulangan</th>
            <th>Keterangan</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($absen as $absn)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $absn->nis }}</td>
            <td>{{ $absn->jam_kepulangan }}</td>
            <td>{{ $absn->jam_kedatangan }}</td>
            <td>{{ $absn->keterangan }}</td>
            <td>
                <form action="{{ route('absen.destroy',$absen->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('absen.edit',$absen->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $absen->links() !!}
        
@endsection