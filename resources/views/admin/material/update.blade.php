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
                                    <th>Mark Per Wrong</th>
                                    <th>Mark Per Right</th>
                                    <th>Level</th>
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
                                                    <td>{{ $test->mark_wrong }} </td>
                                                    <td>+{{ $test->mark_right }} </td>
                                                    <td>{{ $test->test_level }}</td>
                                                   
                                                    <td class="text-center"><a class='btn-social-menu btn-lastfm btn-menu' href="{{ route('admin.material.delete',['id' => $test->id]) }}"><i class="fa fa-trash"></i> 
                                                                               
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input id="id" type="hidden" name="id" value="{{ $test->id }}">
                                                        <input id="id" type="hidden" name="current_questions" value="{{ $current_questions }}">
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
                                                      </select>
                                                            @error('test_type')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                          @enderror 
                                                     </td>
                                                    <td>
                                                    <select  name="num_questions" id="num_questions" class="form-control @error('num_questions') is-invalid @enderror mx-auto " style="width:100px" placeholder="choose" required>
                                                        @if($current_questions == 0)
                                                            {{ $current_questions = 1 }};
                                                        @endif
                                                        @for($c = $current_questions; $c <= 30; $c++)
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
                                                                <input id="mark_wrong"  class="form-control text-center @error('mark_wrong') is-invalid @enderror"  value="{{ $test->mark_wrong }}"  name="mark_wrong" min="-2"  required autocomplete="duration" autofocus/>
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-outline-success" data-dir="up" type="button">+</button>
                                                                    </div>
                                                                 @error('mark_wrong')
                                                                    <span class="invalid-feedback text-center" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror 
                                                            </div>
                                                         </td>
                                                   
                                                        <td class="text-center">
                                                            <div class="input-group mb-3 number-spinner mx-auto" style="width:130px">
                                                                <div class="input-group-prepend">
                                                                    <button class="btn btn-outline-danger" data-dir="dwn" type="button">-</button>
                                                                </div>
                                                                <input id="mark_right"  class="form-control text-center @error('mark_right') is-invalid @enderror"  value="{{ $test->mark_right }}"  name="mark_right" max="2"  required autocomplete="duration" autofocus/>
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-outline-success" data-dir="up" type="button">+</button>
                                                                    </div>
                                                                 @error('mark_right')
                                                                    <span class="invalid-feedback text-center" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror 
                                                            </div>
                                                         </td>
                                                   
                                                    <td>
                                                        <select  name="test_level" id="test_level" class=" form-control @error('test_type') is-invalid @enderror" placeholder="choose" required>
                                                              <option value="Basic" {{ $test->test_level == 'Basic' ? 'selected' : '' }}>          Basic</option>                            
                                                              <option value="Intermediate" {{ $test->test_level == 'Intermediate' ? 'selected' : '' }}>  Intermediate</option>                            
                                                              <option value="High" {{ $test->test_level == 'High' ? 'selected' : '' }}>    High</option>                                                                     
                                                          </select>
                                                                @error('test_level')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                              @enderror 
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
    {{-- <script>

        //Spinner con numeros enteros
    
        // $(document).on('click', '.number-spinner button', function () {    
        //      var btn = $(this),
        //          oldValue = btn.closest('.number-spinner').find('input').val().trim(),
        //          newVal = 1;
             
        //      if (btn.attr('data-dir') == 'up') {
        //          newVal = parseInt(oldValue) + 1;
             
        //      } else {
        //          if (oldValue > 1) {
        //              newVal = parseInt(oldValue) - 1;
                 
                     
        //          } else {
        //              newVal = 0;
        //          }
        //      }
        //      btn.closest('.number-spinner').find('input').val(newVal);
        //  });
     
</script> --}}
<script>
    

    $(document).on('click', '.number-spinner button', function () {    
         var btn = $(this),
             oldValue = btn.closest('.number-spinner').find('input').val().trim(),
             newVal = 1;
         
         if (btn.attr('data-dir') == 'up') {
             newVal = parseFloat(oldValue) + 0.1;
             newVal = newVal.toFixed(2);
             if(oldValue >= 2){
                newVal = 2
              }

         } else {
             if (oldValue > 1) {
                 newVal = parseFloat(oldValue) - 0.1;
                 newVal = newVal.toFixed(2);
                 
             } else {
                newVal = parseFloat(oldValue) - 0.1;
                newVal = newVal.toFixed(2);
              if(oldValue <= -2){
                newVal = -2
              }

             }
         }
         btn.closest('.number-spinner').find('input').val(newVal);
     });
 
 </script>
  
  

@endsection
