@extends('layouts.app')
@section('content')
<link href="{{ asset('css/exam.css') }}" rel="stylesheet">
<br>         
           
           {{$contador = 1}}
      <br>
      <br>
      <br>
      <br>
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

                  <div class="price-plan">
             
                      
                    <h4>{{$contador++}} 
                
                       
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
                                <span class="badge badge-pill badge-success">Right answerd + {{$test->mark_right}}</span>
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
                    
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="row col-md-13">
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
                                                      {{ $nota}} %
                                                </td>   
                                                    <td class="text-center">
                                                      @if($nota >= 65)
                                                      <a href="" class='btn-social-menu btn-menu btn-email' ><i class="fa fa-check"></i></a>
                                                      @else
                                                      <a href="" class='btn-social-menu btn-menu btn-lastfm' ><i class="fa fa-times-circle"></i></a>
                                                      @endif
                                                </td>   
                                                                            
                                                </tr>
                                </tbody> 
                            </table>     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>     


       
</div>

    

@endsection


