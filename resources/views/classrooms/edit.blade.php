@extends('layouts.app')
@section('content')
@if (session('error'))
<div class="alert alert-danger">
    {{session('error')}}
</div>
@endif
<form action="{{route('classrooms.update',['classroom'=>$classroom])}}" method="POST">
@csrf
@method('PUT')
    <div class="form-group">
      <label for="exampleInputEmail1"> Name</label>
      <input type="text" class="form-control" name="class_name" value="{{old('class_name',$classroom->class_name)}}">
      @if ($errors->has('class_name'))
      <span class="text-danger">
        {{$errors->first('class_name')}}
      </span>
      @endif
    </div>
    <div class="form-group">
        <label >Description</label>
      <textarea name="description" class="form-control" rows="10">
        {{old('name',$classroom->description)}}
      </textarea>
        @if ($errors->has('description'))
        <span class="text-danger">
          {{$errors->first('description')}}
        </span>
        @endif
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection