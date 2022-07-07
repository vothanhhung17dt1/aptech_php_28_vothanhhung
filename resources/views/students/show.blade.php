@extends('layouts.app')
@section('content')
<h4>Thông tin Class</h4>
<table class="table">

    <tr>
        <td>FirstName:</td>
        <td>{{$student->first_name}}</td>
    </tr>
    <tr>
        <td>LastName:</td>
        <td>{{$student->last_name}}</td>
    </tr>
    <tr>
        <td>Age:</td>
        <td>{{$student->age}}</td>
    </tr>
    <tr>
        <td>Address:</td>
        <td>{{$student->address}}</td>
    </tr>
</table>
<a href="{{route('students.index')}}" class="btn btn-success">Quay lại</a>


@endsection
