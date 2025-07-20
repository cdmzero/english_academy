@extends('layouts.app')
@section('content')

    

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <br>
    <h1 class="display-4 text-center ">Train Your English <br></h1>
  </div>
</div>
<br>
<div class="container marketing">
    <div class="row">
      @foreach ($tests as $test)
      <div class="col-lg-4 text-center">
        <a href=" {{ route('exercise.form',['test_id' => $test->id]) }}"  class="btn-social-head btn-email">{{ $test->test_name }}</a>
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
    <p class="mb-0">All you need is time and patience, practise makes perfect!</p>
    <footer class="blockquote-footer">English idiom |<cite title="Source Title"> culture of EVS</cite></footer>
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