@extends('layouts.app')
@section('content')
<link href="{{ asset('css/circle_results.css') }}" rel="stylesheet">
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
                <div class="card-header text-center"><h4>Results of <strong> {{ $test->test_name }} </strong>  
                </h4>
                </div>
                
                    <div class="card-body table-responsive">
                        <div class="container">
                        <div class="row col-md-13">
                            <table class="table table-striped custab">
                            <thead>
                                <tr>
                                    <th>User</th>
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
                                                        {{ $result->user->user_name }} <br>
                                                        {{ $result->user->surname }}
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
                                                      {{ $result->total_mark}} %
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
    @foreach ($lines as $line)

      <div class="card">
        
        <div class="card-header">
            
        <a class="card-link" data-toggle="collapse" href="#collapse{{ $line->id }}">
             {{ $line->question_title }} 
          </a>
        </div>
        <div id="collapse{{ $line->id }}" class="collapse" data-parent="#accordion">
          <div class="collapsed card-body table-responsive ">
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
                              @foreach($option_numbers as $option)

                                    @if($line->user_choice != $line->answerd &&  $line->user_choice == $option )
                                    <tr class="alert alert-danger">
                                        <td>
                                        <input type="radio" disabled {{ $line->user_choice != $line->answerd ? 'checked' : '' }}  >
                                        </td>
                                     @else 
                                   <tr class="{{ $line->user_choice == $line->answerd &&  $line->user_choice == $option ? 'alert alert-success' : '' }}">
                                       <td>
                                      <input type="radio" disabled {{ $line->user_choice == $option ? 'checked' : '' }}  >
                                    </td>
                                    @endif 
                                        <td>
                                         {{ $option}}
                                        </td>
                                        <td>
                                            {{ $opts[$line->id][$option] }}
                                        </td>
                          <td class="center">
                            @if($option == $line->answerd)

                            <span class="badge badge-pill badge-success">Right answerd + {{$test->mark_right}}</span>

                            @elseif($line->user_choice == $option && $line->user_choice != $line->answerd)
                            
                            <span class="badge badge-pill badge-danger">Wrong answerd {{ $test->mark_wrong }}</span>

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
     <br>
     <br>
     <br>
     <br>

      <div class="bg-white rounded-lg p-6 shadow">
          <br>

      <h2 class="h6 font-weight-bold text-center mb-4"> <strong> {{$result->user->user_name}} {{$result->user->surname}} </strong>calification's</h2>

        <!-- Progress bar 1 -->
      <div class="progress mx-auto" data-value='{{ $result->total_mark }}'>
          <span class="progress-left">
                        <span class="progress-bar border-primary"></span>
          </span>
          <span class="progress-right">
                        <span class="progress-bar border-primary"></span>
          </span>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <div class="h2 font-weight-bold">{{$result->total_mark}}<sup class="small">%</sup></div>
          </div>
        </div>
        <!-- END -->

        <!-- Demo info -->
        <div class="row text-center mt-4">
          <div class="col-6 border-right">
            <div class="h4 font-weight-bold mb-0">49.5%</div><span class="small text-gray">Calification Average's for {{$test->test_name}} </span>
          </div>
          <div class="col-6">
            <div class="h4 font-weight-bold mb-0">{{$result->proportion}}</div><span class="small text-gray">Proportion</span>
            
          </div>
          
        </div>
        <!-- END -->
        <br>
      </div>
    </div>
      </div>
      </div>
              
@if(Auth::User()->role != 'user')
<div class="mx-auto text-center">
<br>


    @include('includes.buttoms') 




</div>
@endif
</div>

    
<script>
    $(function() {

$(".progress").each(function() {

  var value = $(this).attr('data-value');
  var left = $(this).find('.progress-left .progress-bar');
  var right = $(this).find('.progress-right .progress-bar');

  if (value > 0) {
    if (value <= 50) {
      right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
    } else {
      right.css('transform', 'rotate(180deg)')
      left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
    }
  }

})

function percentageToDegrees(percentage) {

  return percentage / 100 * 360

}

});
</script>

@endsection


