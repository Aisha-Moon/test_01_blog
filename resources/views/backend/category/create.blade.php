@extends('backend.layout.master')
@section('title','Show Details')

@section('content')
  <div class="row">
    <!-- /resources/views/post/create.blade.php -->
 
 {{-- option 1 --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
<!-- Create Post Form -->
    <div class="col-md-6">
      <h1>Create Category</h1>
      <form action="{{route('categories.store')}}" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Category Name</label>
          <input type="text" name="name" placeholder="Category Name" class="form-control">
        </div>
        {{-- option 2 --}}
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <div class="form-group">
          <label for="description">Category Description</label>
          <input type="text" name="description" placeholder="Category Description" class="form-control">

        </div>
        @error('description')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <div class="form-group">
          <input type="submit" class="btn btn-success" value="Submit">
        </div>
      </form>
    </div>
  </div>

@endsection