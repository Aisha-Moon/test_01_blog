@extends('backend.layout.master')
@section('title','Show Details')

@section('content')
  <div class="row">
    <div class="col-md-6">
      <h1>Update Category</h1>
      <form action="{{route('categories.update',$category->id)}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
          <label for="name">Category Name</label>
          <input type="text" name="name" value="{{$category->name}}" placeholder="Category Name" class="form-control">
          
        </div>
        <div class="form-group">
          <label for="description">Category Description</label>
          <input type="text" name="description" 
         value="{{$category->description}}" placeholder="Category Description" class="form-control">

        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-success" value="Submit">
        </div>
      </form>
    </div>
  </div>

@endsection