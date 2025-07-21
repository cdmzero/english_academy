
@extends('layouts.app')
@section('content')
<link href="{{ asset('css/exam.css') }}" rel="stylesheet">

<div class="my-5">

       <section class="our-plans">
         <div class="container">
            <div class=" text-center">
                  <h1 class="display 2"><strong>{{$test->test_name}}</strong> exam</h2>
            </div>
            <br><br>

            @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

<form action="{{ route('exercise.test.store') }}" method="post">
  @csrf
@foreach ($questions as $question)

                  <div class="price-plan">
             
                      
                    <h4> {{ $loop->iteration }}.
                
                       
                           <strong>{{$question->question_title}} </strong><sub></sub>
                     
                          
                        </h4>                  
                        <br>   
                          @foreach ($options[$question->id] as $option)
                          <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio{{$option->id}}{{$option->option_number}}" name="user_choice[{{ $question->id }}]" value="{{$option->option_number}}" class="custom-control-input" required>
                            <label class="custom-control-label" for="customRadio{{$option->id}}{{$option->option_number}}"> {{$option->option_title}}</label>
                          </div>
                          <br>
                          @endforeach
                          <div class="custom-control custom-radio d-none">
                          <input type="radio" id="customRadio{{ $loop->iteration }}5" name="user_choice[{{ $question->id }}]" value="5" class="custom-control-input" required checked>
                              <label class="custom-control-label" for="customRadio{{ $loop->iteration }}5" >Prefer not answer </label>
                          </div>         
                  </div> 
@endforeach
               <input type="hidden" name="test_id" value="{{$test->id}}">
               <div class="mx-auto" style="width:100px">
                   <br>
                   <button type="submit" class="btn btn-primary">
                   Get your result 
                   </button>
               </div>
</form>
              
         </div>
         </div>
         </div>
      </section>
</div>
  
@endsection
