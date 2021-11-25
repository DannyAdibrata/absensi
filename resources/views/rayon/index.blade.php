@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Rayon</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('rayon.create') }}"> Create</a>
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
           <th>Rayon</th>
           <th>Pembimbing Rayon</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($rayon as $sdt)
        <tr>
            <td>{{ $loop->iteration }}</td>          
            <td>{{ $sdt->nama_rayon}}</td>
            <td>{{ $sdt->pemray}}</td>
            <td>
                <form action="{{ route('rombel.destroy',$sdt->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('rayon.edit',$sdt->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    
        
@endsection