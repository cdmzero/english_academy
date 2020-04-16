@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container text-center">
    <br>
    <h1 class="display-3 ">User zone</h1>

    <div class="add">
      <a class="btn btn-outline-success" href=" {{ route('admin.users.create') }} " role="button">+</a>
    
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
      <br>
      <br>
      <br>
      <br>
      <br>
        </div>
    <div class="col-xl-6 m-auto text-center">

      <div class="mx-auto" style="width: 20%">
       
        </div> 

       
       <br>
       <br>
       <br>
        @include('includes.buttoms') 
     
    </div>

  
    @include('includes.live_search') 
   
@endsection
