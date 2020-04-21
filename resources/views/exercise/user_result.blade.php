@extends('layouts.app')
@section('content')
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <div class="card">

                <div class="card-header text-center"><h4>Questions of Test<strong> {{ $test->test_name }} </strong>  
                    <a href=" {{ route('admin.material.create') }} " class="btn-email-result"><i class="fa fa-plus"></i></a>
                </h4>
                </div>
                
                    <div class="card-body">
                        <div class="container">
                        <div class="row col-md-13">
                            <table class="table table-striped custab">
                            <thead>
                                <tr>
                                    <th>Creator</th>
                                    <th>Type</th>
                                    <th>Mark Per Wrong</th>
                                    <th>Mark Per Right</th>
                                    <th>Num of Questions</th>
                                    <th class="text-center">Mark</th>

                                </tr>
                            </thead>
                                <tbody> 
                                                <tr>
                                                    <td>
                                                        {{ $test->user->user_name }} <br>
                                                        {{ $test->user->surname }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $test->test_type }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $test->mark_wrong }}
                                                    </td>
                                                    <td class="text-center">
                                                       +{{ $test->mark_right }}
                                                    </td>
                                              
                                                    <td class="text-center">
                                                        {{$test->num_questions}}
                                                    </td>  
                                                    
                                                    <td class="text-center">
                                                      {{ $nota}} %
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


<br>
<br>


<div class="row justify-content-center">
    <div class="col-md-8">
        
    <div id="accordion">
        @foreach ($test->questions as $question)

      <div class="card">
        
        <div class="card-header">
            
        <a class="card-link" data-toggle="collapse" href="#collapse{{$question->id}}">
             {{$question->question_title}} 
          </a>
        </div>
        <div id="collapse{{$question->id}}" class="collapse" data-parent="#accordion">
          <div class="collapsed card-body">


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
        </div>
      </div>
      @endforeach
      </div>
     

      </div>
      </div>
              
      <div class="mx-auto text-center">

      <h1>Notas</h1>
      <h2>
         {{$n_aciertos}} <br>
        
      </h2>
     
      </div>


<div class="mx-auto text-center">
<br>
    @include('includes.buttoms') 





</div>
       
</div>

    

@endsection


