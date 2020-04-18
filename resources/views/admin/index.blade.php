@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <br>
    <h1 class="display-5 ">Admin zone</h1>
  <h3 class="display-4 text-center"> Welcome {{ Auth::user()->user_name }}</h3>
  <p class="lead text-right">{{ date("F j, Y, g:i a") }}</p>
  </div>
</div>
<br>
<br>
<br>

  <div class="container">
    <div class="row">
      <div class="col-lg-4 text-center">
        <a href="{{ route('admin.material') }}"  class="btn-social-head btn-facebook"><i class="fa fa-briefcase"></i></a>
        <h2>Material</h2>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4 text-center">
        <a href="{{ route('admin.results') }}" class="btn-social-head btn-instagram"><i class="fa fa-area-chart"></i></a>        
        <h2>Results</h2>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4 text-center">
        <a href="{{ route('admin.users') }}"  class="btn-social-head btn-email"><i class=" fa fa-users"></i></a>        
        <h2>Users</h2>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

  <!-- FOOTER -->
  <footer class="container">
    <p>&copy; 2020 English Value School, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>


@endsection