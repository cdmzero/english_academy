@extends('layouts.app')
@section('content')
<link href="{{ asset('css/exam.css') }}" rel="stylesheet">       
   <div class="d-none">
    {{$contador = 1}}
    </div>
<div class="my-5">
      @if(session('message'))
      <div class="alert alert-success">
          {{ session('message') }}
      </div>
      @endif
      
             <section class="our-plans">
               <div class="container">
                  <div class=" text-center">
               
               
                        <h1 class="display 2">Results <strong>{{$test->test_name}}</strong> exam</h2>
                     
                  </div>
                  <br><br>
                  @foreach ($test->questions as $question)

                  <div class="table-responsive">
                    <h4>{{$contador++}}.
                
                       
                           <strong>{{$question->question_title}} </strong><sub></sub>
                     
                          
                        </h4>                  
    <br>   
                  <table class="table custab">
                    <thead>
                        <tr>
                           <th>Option Choosen</th>
                            <th>Option number</th>
                            <th>Option Title</th>
                            <th></th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach( $question->options as $option)
                               @foreach ($choices as $key => $value)
    
                                  @if($key == $question->id )
                                        @if($value != $question->answerd &&  $value == $option->option_number )
                                        <tr class="alert alert-danger">
                                       
                                        @else
                                     <tr class="{{ $value == $question->answerd &&  $value == $option->option_number ? 'alert alert-success' : '' }}">
                                        @endif
                                           <td>
                                          <input type="radio" disabled {{ $value == $option->option_number ? 'checked' : '' }}  >
                                        </td>                            
                                  @endif
                                  @endforeach   
                          
                                            <td>
                                             {{ $option->option_number}}
                                            </td>
                                            <td>
                                                {{ $option->option_title}}
                                            </td>
                              <td class="center">
                                @if($option->option_number == $question->answerd)

                                <span class="badge badge-pill badge-success">Right answer + {{$test->mark_right}}</span>
                                @else
                                    @foreach ($choices as $key => $value)
                                    @if($key == $question->id )
                                    @if($value != $question->answerd &&  $value == $option->option_number )
                                    <span class="badge badge-pill badge-danger">Wrong answer {{$test->mark_wrong}}</span>
                                    @endif
                                    @endif
                                    @endforeach    
    
                                @endif 
                               
                              </td>
                                                      
                            @endforeach
                                        </tr>
                        </tbody>        
                    </table>
                    </div>
                    @endforeach

                </div>
     

            </div>
            </div>
            <div class="mb-4"></div>
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h1 class="display-5 text-center">Get Your Diploma<br></h1>

                    <div class="table-responsive">
                        <div class="row col-md-12">
                            <table class="table responsible ">
                            <thead>
                                <tr>
                                    <th class="text-center">Candidate</th>
                                    <th class="text-center">Percentage</th>
                                    <th class="text-center">Mark Per Wrong</th>
                                    <th class="text-center">Mark Per Right</th>
                                    <th class="text-center">Mark For Diploma</th>
                                    <th class="text-center">Mark</th>
                                    <th class="text-center">Diploma</th>

                                </tr>
                            </thead>
                                <tbody> 
                                                <tr>
                                                    <td>
                                                    {{ Auth::user()->user_name}} <br>
                                                    {{ Auth::user()->surname}}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $n_aciertos }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $test->mark_wrong }}
                                                    </td>
                                                    <td class="text-center">
                                                       +{{ $test->mark_right }}
                                                    </td>
                                              
                                                    <td class="text-center">
                                                        >= 65 %
                                                    </td>  
                                                    
                                                    <td class="text-center">
                                                      {{ $nota }} %
                                                </td>   
                                                    <td class="text-center">
                                                      @if($nota >= 65)
                                                    <form action="{{ route('exam.diploma.store') }}" method="post">
                                                        @csrf
                                                    <input type="hidden" name="result_id" value="{{$result_id}}">
                                                  
                                                      <a onclick="$(this).closest('form').submit()" class='btn-social-menu btn-menu btn-email' ><i class="fa fa-check"></i></a>
                                                    </form>
                                                      @else
                                                      <a class='btn-social-menu btn-menu btn-lastfm'>
                                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Sorry your mark is lower than 65% keep practising! ">
                                                      <i class="fa fa-times-circle"></i></a>
                                                      </span>
                                                      @endif
                                                </td>   
                                                                            
                                                </tr>
                                </tbody> 
                            </table>     
                    </div>
                </div>
            </div>
            </div>
<div class="mb-4"></div>

@if(!empty($exercises))
 
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card-body">
                        <div class="text-center">
                            <h1 class="display-5 ">Keep Pratising English <br></h1>
                            </div>
                        <div class="row col-md-12">
                            <div class="table-responsive">
                            <!-- <table class="table responsible "> -->
                            <table class="table custab">
                            <thead>
                            </thead>
                            <tr>
                                
                               @foreach($exercises as $exercise)
                                <th class="text-center">
                                 <a href=" {{ route('exercise.form',['test_id' => $exercise->id]) }}"  class="btn-social-head btn-email">{{ $exercise->test_name }}</a> 
                                </th>
                                @endforeach

                            </tr>
                        </tbody>
                        </table>     
                        </div>
                    </div>
                </div>
            </div>
             @endif   
                  <br>
        </div>
            
            
            </div>
    </div>
</div>


</div>     


       
</div>

</div>
@endsection
