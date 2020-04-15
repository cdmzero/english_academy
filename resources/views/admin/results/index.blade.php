@extends('layouts.app')

@section('content')


<br><br>
<div class="jumbotron jumbotron-fluid">
  <div class="container text-center">
    <br>
    <h1 class="display-3 ">Results zone</h1>
    <div class="add">
      <a class="btn btn-outline-success" href=" {{ route('admin.results.create') }} " role="button">+</a>
    </div>
  </div>
</div>
  <div class="container marketing">
    <!-- Three columns of text below the carousel -->
    <div class="row">
      @foreach ($tests as $test)
      <div class="col-lg-4 text-center">
        <a href=" {{ route('admin.results.menu',['id'=>$test->id]) }}"  class="btn-social-head btn-instagram">{{ $test->test_name }}</a>
        <h2>{{ $test->test_name }}</h2>
        <br>
      </div><!-- /.col-lg-4 -->
@endforeach


    <!-- START THE FEATURETTES -->
  
  
  </div>
  <div class="col-xl-6 m-auto text-center">
    <br>
    <br>
    <br>
    <br>
    <br>
      @include('includes.buttoms') 
  </div>

@endsection
