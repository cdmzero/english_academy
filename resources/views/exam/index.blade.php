@extends('layouts.app')
@section('content')

    

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <br>
    <h1 class="display-4 text-center ">Test Your Level <br></h1>
  </div>
</div>
<br>
<div class="container marketing">
    <div class="row">
      @foreach ($tests as $test)
      <div class="col-lg-4 text-center">
        <a href=" {{ route('exam.form',['test_id'=>$test->id]) }}"  class="btn-social-head btn-instagram">{{ $test->test_name }}</a>
        <h2 class="title">{{ $test->test_level }}
            </h2>
        <br>
      </div>
@endforeach

  
  
  </div>
<br>
<br>
<br>
<br>

<blockquote class="blockquote text-center">
    <p class="mb-0">All these exams include a Diploma in recognisation to your level, I expect you to get one!<sup></sup></p>
    <footer class="blockquote-footer">Jose Funez<cite title="Source Title"> CEO of EVS</cite></footer>
  </blockquote>

<br>
<br>
<br>
<br>
<br>
<br>
<br>

  <!-- FOOTER -->
  <footer class="container">
    <p>&copy; 2025 English Value School, Inc. &middot; <a href="{{ route('privacy-policy') }}">Privacy</a></p>
  </footer>
</main>


@endsection