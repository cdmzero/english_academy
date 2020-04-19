@extends('layouts.app')
@section('content')
@php
@endphp
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">

            @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif

            <form action="{{ route('admin.material.save_update') }}" method="post">
                @csrf

            <div class="card">
                <div class="card-header"><strong> Update </strong> Test </div>
                    <div class="card-body">
                        <div class="container">
                        <div class="row col-md-14">

                            <table class="table table-striped custab text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th class="text-center">Test Name</th>
                                    <th>Type</th>
                                    <th>Number Questions</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>     
                                                <tr>
                                                    <td>
                                                        {{ $test->id }}
                                                    </td>
                                                    <td>{{ $test->test_name }}</td>
                                                    <td>{{ $test->test_type }} </td>
                                                    <td>{{ $test->num_questions }} </td>                                                                                                     
                                                    <td>{{ $test->duration }} Min</td>
                                                    <td>{{ $test->status }}</td>
                                                    <td>{{ \FormatTime::LongTimeFilter($test->created_at) }}</td>
            
                                                   
                                                    <td class="text-center"><a class='btn-social-menu btn-lastfm btn-menu' href="{{ route('admin.material.delete',['id' => $test->id]) }}"><i class="fa fa-trash"></i> 
                                                                               
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input id="id" type="hidden" name="id" value="{{ $test->id }}">
                                                    </td>
                                                    <td>
                                                        <input id="test_name" type="text" class="form-control @error('test_name') is-invalid @enderror text-center" name="test_name" placeholder="Test Name" value="{{ $test->test_name}}" required autocomplete="test_name" autofocus>
                                                        @error('test_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                      @enderror 
                                                    </td>
                                               
                                                    <td>
                                                    <select  name="test_type" id="test_type" class=" form-control @error('test_type') is-invalid @enderror" placeholder="choose" required>
                                                          <option value="Exam" {{ $test->test_type == 'Exam' ? 'selected' : '' }}>          Exam</option>                            
                                                          <option value="Exercise" {{ $test->test_type == 'Exercise' ? 'selected' : '' }}>  Exercise</option>                            
                                                          <option value="Grammar" {{ $test->test_type == 'Grammar' ? 'selected' : '' }}>    Grammar</option>                                                                     
                                                      </select>
                                                            @error('test_type')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                          @enderror 
                                                     </td>
                                                    <td>
                                                    <select  name="num_questions" id="num_questions" class="form-control @error('num_questions') is-invalid @enderror mx-auto" style="width:50px" placeholder="choose" required>
                                                            @for($c = 1; $c <= 30; $c++)
                                                          <option value="{{$c}}"> {{$c}}</option>                            
                                                            @endfor         
                                                      </select>
                                                            @error('num_questions')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                          @enderror 
                                                     </td>
                                                  
                                                        <td class="text-center">
                                                            <div class="input-group mb-3 number-spinner mx-auto" style="width:130px">
                                                                <div class="input-group-prepend">
                                                                    <button class="btn btn-outline-danger" data-dir="dwn" type="button">-</button>
                                                                </div>
                                                                <input id="duration"  class="form-control text-center @error('duration') is-invalid @enderror"  value="{{ $test->duration }}"  name="duration" max="30" min="5" required autocomplete="duration" autofocus/>
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-outline-success" data-dir="up" type="button">+</button>
                                                                    </div>
                                                                 @error('duration')
                                                                    <span class="invalid-feedback text-center" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror 
                                                            </div>
                                                         </td>
                                                     <td>
                                                     </td>
                                                     <td>
                                                     </td>
                                                     
                                                    <td class="text-center">
                                                     
                                                    <button class='btn-instagram btn-social-menu btn-menu' type="submit"><i class="fa fa-edit"></i></a></button>
                                                </form>
                                                    <br>
                                                  
                                                        <a class="btn btn-sencond" href="{{ route('admin.material') }}" >Exit </a>
                                                   
                                                    </td>                                                                
                                                </tr>                  
                                </table>

                </div>
            </div>
 
              
        </div>
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
