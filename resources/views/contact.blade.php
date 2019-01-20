@extends('layouts.app')

@section('content')


@if(count($errors))
  <div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $error)
      {{$error}}
      <br>
    @endforeach

  </div>

@endif

  <h1>contact</h1>

  <form method = "post">
      {{ csrf_field() }}
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input name = "email" class="form-control"  placeholder="Enter email" value="{{ old('email') }}">
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Name</label>
          <input name = "name" class="form-control"  placeholder="Password" value="{{ old('name') }}">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Message</label>
          <textarea name= "msg" class="form-control" rows="5" id="comment" value="{{ old('msg') }}"></textarea>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>



@endsection