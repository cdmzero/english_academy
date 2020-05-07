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
                @if($test->status == "Pending" && $test->id == Auth::user()->id )
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
                                                    @if($test->status == "Public")
                                                    <td>
                                                     <span class="badge badge-pill badge-success">{{ \FormatTime::LongTimeFilter($test->updated_at) }}</td></span> 

                                                    </td>
                                                    @endif
                                                    <td>
                                                        {{$test->status}}
                                                    </td>
                                                    
                                                    <td class="text-center">

                                                        
                                                    @if($test->status == 'Complete' && $test->user_id == Auth::user()->id )
                                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Save it first!">
                                                    <a class='btn-social-menu btn-menu btn-email'><i class="fa fa-check"></i></a>
                                                    </span>

                                                    @elseif($test->status == 'Pending' && $test->user_id == Auth::user()->id )
                                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title=" You need {{ $test->num_questions - $cuenta }} questions more for publish, hurry up!">
                                                        <a ref="" class='btn-social-menu btn-menu btn-email' ><i class="fa fa-check"></i></a>
                                                        </span> 
                                                    @else

                                                        @if($test->user_id == Auth::user()->id)
                                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Are you sure? Let's go back!">
                                                        <a href="{{ route( 'admin.material.publication',['test_id' => $test->id]) }}" class='btn-social-menu btn-menu btn-lastfm' ><i class="fa fa-times-circle"></i></a>
                                                        </span>
                                                        @endif

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
                Update <strong>Question</strong>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.question.save_update') }}"  method="POST">
                    @csrf 
                              
                    <div class="form-group row">
                        <label for="question_title" class="col-md-4 col-form-label text-md-right">{{ __('Question Title') }}</label>

                        <div class="col-md-6">
                            <input id="question_title" type="text" class="form-control @error('question_title') is-invalid @enderror" name="question_title" placeholder="Test Name" value="{{ $question->question_title }}" required autocomplete="option_title" autofocus>

                            @error('question_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    @foreach ($options as $option)
                        
                  
                    <div class="form-group row">
                        <label for="option_title" class="col-md-4 col-form-label text-md-right">Option {{ $option->option_number }}</label>

                        <div class="col-md-6">
                            <input id="option_title" type="text" class="form-control @error('option_title') is-invalid @enderror" name="option_title[{{$option->id}}]" placeholder="Option 1" value="{{$option->option_title}}" required autocomplete="option_title" autofocus>

                            @error('option_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> 
                    @endforeach  
                    <div class="form-group row">
                        <label for="test_type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                        <div class="col-md-6">                     
                        <div class="btn-group btn-group-toggle  @error('test_type') is-invalid @enderror  mx-auto" style="width:328px" data-toggle="buttons" required>
                            <label class="btn btn-secondary active">
                              <input type="radio" name="answerd" id="answerd_1" {{ $question->answerd == 1 ? 'checked' : '' }}  value="1"> Option 1
                            </label>
                            <label class="btn btn-secondary">
                              <input type="radio" name="answerd" id="answerd_2" {{ $question->answerd  == 2 ? 'checked' : '' }} value="2"> Option 2
                            </label>
                            <label class="btn btn-secondary">
                              <input type="radio" name="answerd" id="answerd_3"  {{ $question->answerd  == 3 ? 'checked' : '' }} value="3"> Option 3
                            </label>
                            <label class="btn btn-secondary">
                              <input type="radio" name="answerd" id="answerd_4" {{ $question->answerd  == 4 ? 'checked' : '' }}  value="4"> Option 4
                            </label>
                        </div>     
                        @error('answerd')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input type="hidden" name="question_id" value="{{$question->id}}">

                        </div>                               
                    </div>                        
                    <br><br>  
                    <div class="form-group row">

                            <div class="mx-auto" width="33px">
                                <button type="submit" class="btn btn-success">
                                Save  
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


