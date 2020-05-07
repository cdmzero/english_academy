
@extends('layouts.app')
@section('content')
<link href="{{ asset('css/exam.css') }}" rel="stylesheet">
{{$contador = 1}}
<br>
<br>
<br>
<br>
       <section class="our-plans">
         <div class="container">
            <div class=" text-center">
         
                  <h1 class="display 2"><strong>{{$test->test_name}}</strong> exam</h2>
               
            </div>
            <br><br>

<form action="{{ route('exercise.test.store') }}" method="post">
  @csrf
@foreach ($questions as $question)

            <!-- PLANS STARTS -->

                  <div class="price-plan">
             
                      
                    <h4>{{$contador++}} 
                
                       
                           <strong>{{$question->question_title}} </strong><sub></sub>
                     
                          
                        </h4>                  
    <br>   
                          @foreach ($question->options as $option)
                          <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio{{$option->id}}{{$option->option_number}}" name="user_choice[{{ $question->id }}]" value="{{$option->option_number}}" class="custom-control-input" required>
                            <label class="custom-control-label" for="customRadio{{$option->id}}{{$option->option_number}}"> {{$option->option_title}}</label>
                          </div>
                          <br>
                          @endforeach
                          <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio{{$contador}}5" name="user_choice[{{ $question->id }}]" value="5" class="custom-control-input" required checked>
                              <label class="custom-control-label" for="customRadio{{$contador}}5" >I prefer not answerd </label>
                            </div>         
                  </div> 
               <!-- Plans ends -->         
@endforeach
               <input type="hidden" name="test_id" value="{{$test->id}}">
               <div class="mx-auto" style="width:50px">
                   <br>
                   <button type="submit" class="btn btn-primary">
                   Send   
                   </button>
               </div>
</form>
              
         </div>
         </div>
         </div>
      </section>
@endsection
