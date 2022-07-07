@extends('layouts.app')

@section('title')
<title>Quản Lý Học Sinh</title>
@endsection

@section('content')
<div class='container'>
<h1>Danh sách lớp học</h1>
 <a href="{{ route('students.create') }}" class="btn btn-primary my-3" type="button">Thêm Học Sinh</a>
@if($students->count())
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Age</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach ($students as $student)
    <tr>
      <td>{{$student->id}}</td>
      <td>{{$student->first_name}}</td>
      <td>{{$student->last_name}}</td>
      <td>{{$student->age}}</td>
      <td>{{$student->address}}</td>
      <td>
      <a href="{{ route('students.show',['student'=>$student->id]) }}" class="btn btn-primary my-3" type="button">View</a>
      <a href="{{ route('students.edit',['student'=>$student->id]) }}" class="btn btn-primary my-3" type="button">Edit</a>
     
      <form action="{{ route('students.destroy',['student'=>$student->id])}}" method="POST" style='display:inline-block'>
      @csrf
      @method('delete')

      <button type='submit' class='btn btn-danger'>Delete</button>
      </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
@else <h4>Chưa có học sinh nào được tạo</h4>
@endif
</div>
@endsection