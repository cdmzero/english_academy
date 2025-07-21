@extends('layouts.app')
@section('content')
<div class="my-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
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


            <div class="card">

                <div class="card-header text-center"><strong> <h4> {{ $test->test_name }} </strong> Exercise 
                </h4>
                </div>

                    <div class="card-body">

              
                    <form action="{{ route('exercise.test.store') }}" method="post">

                        @csrf
                       
                                        @foreach($questions as $question)      
                                        <div class="card">                    
                                        <div class="card-header"> <strong> <p> {{ $loop->iteration }}. {{ $question->question_title }}</p></strong></div>
                                        
                                       
                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row col-md-13">
                                                    <div class="card-body">
                                                        @foreach($question->options as $option)

                                                        <input type="radio"  id="user_choice[{{$question->id}}]"  name="user_choice[{{$question->id}}]"  value="{{$option->option_number}}"></input>
                                                


                                                        {{ $option->option_title }}

                                                        

                                                        <br>                                                        
                                                        @endforeach
                                                        <div class="custom-control custom-radio d-none">
                                                        <input type="radio" id="5" name="user_choice[{{ $question->id }}]" value="5" class="custom-control-input" required checked>
                                                        <label class="custom-control-label" for="5" >Prefer not answer </label>
                                                        </div>                           
                               
                                                        </div>

                                                        </div>
                                                        </div>
                                                        </div> 
                                                        </div> 
                                                        <br>     <br>
                                                               
                                                        
                                                        
                                        @endforeach

                                        <input type="hidden" name="test_id" value="{{$test->id}}">
                                        <div class="mx-auto text-center" style="35px">
                                            <br>
                                            <button type="submit" class="btn btn-primary">
                                            Check answers   
                                            </button>
                                        </div>

                    </form>
                                            
    
</div>
</div>
    
</div>


@endsection


