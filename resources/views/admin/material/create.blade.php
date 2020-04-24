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
                <div class="card-header">
                    New <strong>Test</strong>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.material.store') }}"  method="POST">

                        @csrf
                       
                        <div class="form-group row">
                            <label for="test_name" class="col-md-4 col-form-label text-md-right">{{ __('Test Name') }}</label>

                            <div class="col-md-6">
                                <input id="test_name" type="text" class="form-control @error('test_name') is-invalid @enderror" name="test_name" placeholder="Test Name" value="{{ old('test_name') }}" required autocomplete="user_name" autofocus>

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
                                  <input type="radio" name="test_type" id="Exam"      value="Exam"> Exam
                                </label>
                                <label class="btn btn-secondary">
                                  <input type="radio" name="test_type" id="Exercise"  value="Exercise"> Exercise
                                </label>
                            </div>     
                            @error('test_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>                               
                        </div>
                        <div class="form-group row">
                            <label for="num_questions" class="col-md-4 col-form-label text-md-right">{{ __('Number of questions') }} </label>

                            <div class="col-md-6">
                                <select  name="num_questions" id="num_questions" class=" form-control @error('num_questions') is-invalid @enderror" placeholder="choose" required>
                                  @for($c = 1; $c <= 30; $c++)
                                <option value="{{$c}}"> {{$c}}</option>                            
                                  @endfor         
                            </select>
                                  @error('num_questions')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror 
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="test_level" class="col-md-4 col-form-label text-md-right">{{ __('Level') }}</label>
        
                            <div class="col-md-6">
                         
                            <div class="btn-group btn-group-toggle  @error('test_level') is-invalid @enderror  mx-auto" style="width:328px" data-toggle="buttons" required>
                                <label class="btn btn-secondary active">
                                  <input type="radio" name="test_level" value="Basic"> Basic
                                </label>
                                <label class="btn btn-secondary">
                                  <input type="radio" name="test_level" value="Intermediate"> Intermediate
                                </label>
                                <label class="btn btn-secondary">
                                  <input type="radio" name="test_level" value="High"> High
                                </label>
                            </div>     
                            @error('test_level')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>                               
                        </div>
                        <div class="form-group row">
                            <label for="duration" class="col-md-4 col-form-label text-md-right">{{ __('Duration in Minutes') }}</label>
                            <div class="col-md-6">
                                <div class="input-group mb-3 number-spinner">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-danger" data-dir="dwn" type="button">-</button>
                                    </div>
                                    <input id="duration"  class="form-control text-center @error('duration') is-invalid @enderror"  value="5" name="duration" max="60" min="5" required autocomplete="duration" autofocus/>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-success" data-dir="up" type="button">+</button>
                                    </div>    
                                    @error('duration')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror                          
                                </div>
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

<div class="col-xl-6 m-auto text-center">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
   
    @include('includes.buttoms') 
</div>
<script>

    //Spinner con numeros enteros

    $(document).on('click', '.number-spinner button', function () {    
         var btn = $(this),
             oldValue = btn.closest('.number-spinner').find('input').val().trim(),
             newVal = 1;
         
         if (btn.attr('data-dir') == 'up') {
             newVal = parseInt(oldValue) + 1;
         
         } else {
             if (oldValue > 1) {
                 newVal = parseInt(oldValue) - 1;
             
                 
             } else {
                 newVal = 0;
             }
         }
         btn.closest('.number-spinner').find('input').val(newVal);
     });
 
 </script>
  
 


@endsection
