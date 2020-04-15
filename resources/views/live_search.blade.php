@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container text-center">
    <br>
    <h1 class="display-3 ">User zone</h1>

    <div class="add">
      <a class="btn btn-outline-success" href=" {{ route('admin.results.create') }} " role="button">+</a>
    
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
</div>

  <div class="container marketing">
           <div class="row"  id="resultados">

           
 
    <!-- Three columns of text below the carousel -->

    <div class="col-xl-6 m-auto text-center">
       
        @include('includes.buttoms') 
     
    </div>


    @include('includes.live_search') 
        
        

@endsection