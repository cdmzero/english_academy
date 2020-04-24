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
                                    <th>Status</th>
                                    <th class="text-center">Publish</th>
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
                                                    <td>
                                                        {{$test->status}}
                                                    </td>
                                                    
                                                    <td class="text-center">
                                                    @if($test->status == 'Complete' && $test->user_id == Auth::user()->id )
                                                    @elseif($test->status == 'Complete' && $test->user_id == Auth::user()->id )
                                                    @else
                                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title=" You need {{ $test->num_questions - $cuenta }} questions more for public, hurry up!">
                                                    <a ref="" class='btn-social-menu btn-menu btn-email' ><i class="fa fa-check"></i></a>
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
    </div>
</div>

<br><br>

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                New <strong>Question</strong>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.question.store') }}"  method="POST">
                    @csrf 
                              
                    <div class="form-group row">
                        <label for="question_title" class="col-md-4 col-form-label text-md-right">{{ __('Question Title') }}</label>

                        <div class="col-md-6">
                            <input id="question_title" type="text" class="form-control @error('question_title') is-invalid @enderror" name="question_title" placeholder="Test Name" value="{{ old('test_name') }}" required autocomplete="option_title" autofocus>

                            @error('question_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="option_title" class="col-md-4 col-form-label text-md-right">{{ __('Option 1') }}</label>

                        <div class="col-md-6">
                            <input id="option_title" type="text" class="form-control @error('option_title') is-invalid @enderror" name="option_title[]" placeholder="Option 1" value="" required autocomplete="option_title" autofocus>

                            @error('option_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="option_title" class="col-md-4 col-form-label text-md-right">{{ __('Option 2') }}</label>

                        <div class="col-md-6">
                            <input id="option_title" type="text" class="form-control @error('option_title') is-invalid @enderror" name="option_title[]" placeholder="Option 2" value="" required autocomplete="option_title" autofocus>

                            @error('test_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="option_title" class="col-md-4 col-form-label text-md-right">{{ __('Option 3') }}</label>

                        <div class="col-md-6">
                            <input id="option_title" type="text" class="form-control @error('option_title') is-invalid @enderror" name="option_title[]" placeholder="Option 3" value="{{ old('test_name') }}" required autocomplete="option_title" autofocus>

                            @error('option_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="option_title" class="col-md-4 col-form-label text-md-right">{{ __('Option 4') }}</label>

                        <div class="col-md-6">
                            <input id="option_title" type="text" class="form-control @error('option_title') is-invalid @enderror" name="option_title[]" placeholder="Option 4" value="" required autocomplete="option_title" autofocus>

                            @error('test_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="test_type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                        <div class="col-md-6">                     
                        <div class="btn-group btn-group-toggle  @error('test_type') is-invalid @enderror  mx-auto" style="width:328px" data-toggle="buttons" required>
                            <label class="btn btn-secondary active">
                              <input type="radio" name="answerd" id="answerd_1"   value="1"> Option 1
                            </label>
                            <label class="btn btn-secondary">
                              <input type="radio" name="answerd" id="answerd_2"  value="2"> Option 2
                            </label>
                            <label class="btn btn-secondary">
                              <input type="radio" name="answerd" id="answerd_3"   value="3"> Option 3
                            </label>
                            <label class="btn btn-secondary">
                              <input type="radio" name="answerd" id="answerd_4"   value="4"> Option 4
                            </label>
                        </div>     
                        @error('answerd')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input type="hidden" name="test_id" value="{{$test->id}}">

                        </div>                               
                    </div>                        
                    <br><br>  
                    <div class="form-group row">

                            <div class="mx-auto" width="33px">
                                <button type="submit" class="btn btn-success">
                                Add 
                                </button>
                            </div>
                </div>
                </form>
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
        <div id="collapse{{$question->id}}" class="collapse" data-parent="#accordion" >
          <div class="collapsed card-body">


            <table class="table table-striped custab">
                <thead>
                    <tr>
                        <th>Option number</th>
                        <th>Option Title</th>
                        <th>
                            <div class="text-center" style="width:160%">
                                <a ref="" class='btn-social-menu btn-menu btn-lastfm' ><i class="fa fa-trash"></i></a>
                     
                                <a ref="" class='btn-social-menu btn-menu btn-facebook' ><i class="fa fa-edit"></i></a>
                              </div>
                        
                                
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


