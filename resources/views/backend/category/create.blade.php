@extends('backend.layout.master')
@section('title','Show Details')

@section('content')
  <div class="row">
    <div class="col-md-6">
      <h1>Create Category</h1>
      <form action="{{route('categories.store')}}" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Category Name</label>
          <input type="text" name="name" placeholder="Category Name" class="form-control">
          
        </div>
        <div class="form-group">
          <label for="description">Category Description</label>
          <input type="text" name="description" placeholder="Category Description" class="form-control">

        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-success" value="Submit">
        </div>
      </form>
    </div>
  </div>

@endsection