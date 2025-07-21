@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<div class="jumbotron jumbotron-fluid">

  <div class="form-group row">
  <div class="container text-center">
    <br>
 
    <h1 class="display-3">User zone</h1> 
       <a href=" {{ route('admin.users.create') }} "  class="btn-email-result"><i class="fa fa-plus"></i></a> </div>

  </div>
  </div>
  </div>

  <div class="buscar-caja"> 
    <input type="text" id="search" class="buscar-txt" placeholder="Search ....."/> 
    <a class="buscar-btn"> <i class="fa fa-search"></i> </a> 

 
</div>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
</div>
 
  <div class="container">


    @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
  
    <div class="row"  id="resultados">
      
      <br>
      <br>
      <br>
      <br>
      <br>
    </div> 
                        

    <div class="col-xl-6 m-auto text-center">

       
       <br>
       <br>
       <br>
        @include('includes.buttoms') 
     
    </div>


    @include('includes.live_search') 


@endsection
