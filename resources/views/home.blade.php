@extends('layouts.app')

@section('content')

<div class="container">

  {{-- Flash messages --}}
  @if(session('message'))
    <div class="alert alert-success mt-4">
        {{ session('message') }}
    </div>
  @endif

  @if(session('error'))
    <div class="alert alert-danger mt-4">
        {{ session('error') }}
    </div>
  @endif

  {{-- Main action buttons --}}
  <div class="row justify-content-center text-center my-5 py-5">
    <div class="col-md-4 mb-4">
      <a href="{{ route('exams.index') }}" class="btn-social-head btn-facebook">
        <i class="fa fa-line-chart"></i>
      </a>
      <h2 class="mt-2">Test your English</h2>
    </div>

    <div class="col-md-4 mb-4">
      <a href="{{ route('exercises.index') }}" class="btn-social-head btn-email">
        <i class="fa fa-area-chart"></i>
      </a>
      <h2 class="mt-2">Exercises</h2>
    </div>
  </div>

  <!-- EXAM FEATURES -->

  {{-- Featurette 1: Placement Test --}}
  <div class="row featurette align-items-center my-5">
    <div class="col-md-7">
      <h2 class="featurette-heading">Find your current level. <span class="text-muted">Start with confidence.</span></h2>
      <p class="lead">
        Our placement test helps you discover your real English level—from A1 to C1—in just a few minutes.
        Get a quick evaluation and a personalized recommendation for your next learning steps.
      </p>
    </div>
    <div class="col-md-5">
      <img src="../img/uni.jpg" class="img-fluid d-block mx-auto logo" alt="Placement Test">
    </div>
  </div>

  <hr class="featurette-divider">

  {{-- Featurette 2: Grammar Test --}}
  <div class="row featurette align-items-center my-5">
    <div class="col-md-7 order-md-2">
      <h2 class="featurette-heading">Grammar Challenge. <span class="text-muted">Test your foundation.</span></h2>
      <p class="lead">
        Evaluate your grammar skills with a wide range of structures: tenses, modals, conditionals, prepositions, and more.
        Identify your strong points and the areas where you can improve the most.
      </p>
    </div>
    <div class="col-md-5 order-md-1">
      <img src="../img/london.jpg" class="img-fluid d-block mx-auto logo" alt="Grammar Test">
    </div>
  </div>

  <hr class="featurette-divider">

  {{-- Featurette 3: Reading Test --}}
  <div class="row featurette align-items-center my-5">
    <div class="col-md-7">
      <h2 class="featurette-heading">Reading comprehension. <span class="text-muted">Train with real texts.</span></h2>
      <p class="lead">
        Practice understanding short and long texts with context-based questions. 
        Improve your skills in identifying key ideas, vocabulary, and details. Perfect for exam prep like Cambridge, IELTS, or TOEFL.
      </p>
    </div>
    <div class="col-md-5">
      <img src="../img/campus.jpg" class="img-fluid d-block mx-auto logo" alt="Reading Test">
    </div>
  </div>

  <hr class="featurette-divider">

</div> <!-- end .container -->

@endsection
