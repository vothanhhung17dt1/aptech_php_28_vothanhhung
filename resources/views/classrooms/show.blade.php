@extends('layouts.app')
@section('content')
<h4>Thông tin Class</h4>
<table class="table">

    <tr>
        <td>Class Name:</td>
        <td>{{$classroom->class_name}}</td>
    </tr>
    <tr>
        <td>Description:</td>
        <td>{{$classroom->description}}</td>
    </tr>
</table>
<a href="{{route('classrooms.index')}}" class="btn btn-success">Quay lại</a>


@endsection