@extends('layouts.app')

@section('content')


<br><br>
<div class="jumbotron jumbotron-fluid">
  <div class="container text-center">
    <br>
    <h1 class="display-3 ">Results zone</h1>
    <div class="add">
      <a href=" {{ route('admin.results.create') }} " class="btn-email-result"><i class="fa fa-plus"></i></a>
    </div>
  </div>
</div>
  <div class="container marketing">
    <!-- Three columns of text below the carousel -->
    <div class="row">
      @foreach ($tests as $test)
      <div class="col-lg-4 text-center">
        <a href=" {{ route('admin.results.menu',['id'=>$test->id]) }}"  class="btn-social-head btn-instagram">{{ $test->test_name }}</a>
        <h2 class="title">{{ $test->test_name }}
         
          <div class="dropdown">
            <button class="btn btn-noborder" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-cog"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              {{-- <a class="dropdown-item btn-menu" href= {{! route('admin.test.update',['id'=>$test->id]) !}} ><i class="fa fa-edit"></i> Edit</a> --}}
              {{-- <a class="dropdown-item btn-menu btn-delete"  href="{{! route('admin.test.update',['id'=>$test->id]) !}}"><i class="fa fa-trash"></i> Remove</a> --}}
            </div></h2>
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
