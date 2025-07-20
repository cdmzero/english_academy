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
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <div class="card">

                <div class="card-header text-center"><h4>Questions of Test<strong> {{ $test->test_name }} </strong>  
                @if($test->status == "Pending" && $test->user_id == Auth::user()->id || $test->status == "Pending" && Auth::user()->role == 'admin' )

                    <a href=" {{ route('admin.question.create',['test_id' => $test->id]) }} " class="btn-email-result"><i class="fa fa-plus"></i></a>
                    
                @endif
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
                                    @if($test->status == "Public" )
                                    <th>
                                     Published
                                    </th>
                                    @endif
                                    <th>Status</th>
                                    @if($test->user_id == Auth::user()->id || Auth::user()->role == "admin")
                                    <th class="text-center">Publish</th>
                                    @endif
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
                                                    @if($test->status == "Public")
                                                    <td>
                                                     <span class="badge badge-pill badge-success">{{ \FormatTime::LongTimeFilter($test->updated_at) }}</td></span> 

                                                    </td>
                                                    @endif
                                                    <td>
                                                        {{$test->status}}
                                                    </td>
                                                    @if($test->user_id == Auth::user()->id || Auth::user()->role == "admin")
                                                    <td class="text-center">

                                                        
                                                        @if($test->status == 'Complete' )
                                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Are you ready? Let's Go!">
                                                        <a href="{{ route( 'admin.material.publication',['test_id' => $test->id] ) }}" class='btn-social-menu btn-menu btn-email'><i class="fa fa-check"></i></a>
                                                        </span>

                                                        @elseif($test->status == 'Pending')
                                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title=" You need {{ $test->num_questions - $cuenta }} questions more for publish, hurry up!">
                                                            <a ref="" class='btn-social-menu btn-menu btn-email' ><i class="fa fa-check"></i></a>
                                                            </span> 
                                                        @else
                                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Are you sure? Let's go back!">
                                                            <a href="{{ route( 'admin.material.publication',['test_id' => $test->id]) }}" class='btn-social-menu btn-menu btn-lastfm' ><i class="fa fa-times-circle"></i></a>
                                                            </span>
                                                        @endif

                                                    
                                                    </td>   
                                                    @endif                            
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
        @foreach ($questions as $question)

      <div class="card">
        
        <div class="card-header">
            
        <a class="card-link" data-toggle="collapse" href="#collapse{{$question->id}}">
             {{$question->question_title}} 
          </a>
        </div>
        <div id="collapse{{$question->id}}" class="collapse" data-parent="#accordion">
          <div class="collapsed card-body">


            <table class="table table-striped custab">
                <thead>
                    <tr>
                        <th>Option number</th>
                        <th>Option Title</th>
                        <th>
                        </th>
                        <th>
                            @if($test->status != 'Public' && $test->user_id == Auth::user()->id|| $test->status != 'Public' && Auth::user()->role == 'admin' )
                            <div class="text-center" style="width:160%">
                                <a href="{{ route('admin.question.delete',['question_id' => $question->id]) }}" class='btn-social-menu btn-menu btn-lastfm' ><i class="fa fa-trash"></i></a>
                     
                                <a href="{{ route('admin.question.update',['question_id' => $question->id]) }}" class='btn-social-menu btn-menu btn-facebook' ><i class="fa fa-edit"></i></a>
                              </div>
                            @endif
                        </th>
                        
                    </tr>
                </thead>
                    <tbody>
                        @foreach( $question->options as $option)                
                                    <tr>
                                        <td>
                                         {{ $option->option_number}}
                                        </td>
                                        <td>
                                            {{ $option->option_title}}
                                        </td>
                          <td class="center">
                            @if($option->option_number == $question->answerd)
                            <span class="badge badge-pill badge-success">Right answer + {{$test->mark_right}}</span>
                            @endif
                          </td>
                            <td class="text-center">              
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
              
     
    <br>

<div class="col-xl-6 m-auto text-center">
<br>
    @include('includes.buttoms') 


</div>
       
</div>

<script>
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>
@endsection


