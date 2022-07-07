@extends('layouts.app')

@section('title')
<title>Quản Lý Lớp Học</title>
@endsection

@section('content')
<div class='container'>
<h1>Danh sách lớp học</h1>
 <a href="{{ route('classrooms.create') }}" class="btn btn-primary my-3" type="button">Thêm Lớp</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">ClassName</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($classrooms as $classroom)
    <tr>
      <td>{{$classroom->id}}</td>
        <td>{{$classroom->class_name}}</td>
      <td>{{$classroom->description}}</td>
      
      <td>
      <a href="{{ route('classrooms.show',['classroom'=>$classroom->id]) }}" class="btn btn-primary my-3" type="button">View</a>
      <a href="{{ route('classrooms.edit',['classroom'=>$classroom->id]) }}" class="btn btn-primary my-3" type="button">Edit</a>
     
      <form action="{{ route('classrooms.destroy',['classroom'=>$classroom->id])}}" method="POST" style='display:inline-block'>
      @csrf
      @method('delete')

      <button type='submit' class='btn btn-danger'>Delete</button>
      </form>
      </td>
    </tr>
    
    @endforeach
    
  </tbody>
</table>
</div>
@endsection