@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Student</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('student.create') }}"> Create</a>
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
           <th>Nama</th>
           <th>Rombel</th>
           <th>Rayon</th>
           <th>Username</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($student as $sdt)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $sdt->nis}}</td>
            <td>{{ $sdt->nama}}</td>
            <td>{{ $sdt->rombel}}</td>
            <td>{{ $sdt->rayon}}</td>
            <td>{{ $sdt->email}}</td>
            <td>
                <form action="{{ route('student.destroy',$sdt->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('student.edit',$sdt->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $student->links() !!}
        
@endsection