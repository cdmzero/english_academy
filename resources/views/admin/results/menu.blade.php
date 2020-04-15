
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

            @foreach ( $tests as $test )

            <div class="card">

                <div class="card-header"><strong> {{ $test->test_name }} </strong> results </div>
                    <div class="card-body">
                        <div class="container">
                        <div class="row col-md-13">

                            <table class="table table-striped custab">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Mark</th>
                                    <th>Date & Hour</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                                        @foreach($results as $result)                  
                                                <tr>
                                                    <td>
                                                        {{ $result->id }}
                                                    </td>
                                                    <td>
                                                        {{ $result->user->user_name }} {{ $result->user->surname }}
                                                    </td>
                                                    <td>
                                                        {{ $result->mark }} %
                                                    </td>
                                                    <td>
                                                        {{  \FormatTime::LongTimeFilter($result->created_at) }}
                                                    </td>
                                                    <td class="text-center">
                                                        <a class='btn-social-menu btn-instagram btn-menu' href="{{ route('admin.results.detail',['result_id' => $result->id]) }}"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('admin.userview',['id' => $result->user_id]) }}" class="btn-social-menu btn-email btn-menu"><i class="fa fa-user"></i></span></a>
                                                    </td>   
                                                                            
                                                        @php $peaje="hola"; //para cuando haya al menos 1 resultado
                                                        @endphp  
                                        @endforeach
                                                </tr>           
                            </table>
                              @if(!isset($peaje))
                            <strong> No data entry for this exam </strong>   
                    <br> 
                </div>
            </div>
       
                    @else
                    <small> Total data entry {{ $cuenta }} </small>
                    </div>
                    <div class="mx-auto" style="width: 20%">
                    {{ $results->links()}}
                    </div> 

                   

                                    
                   
                     @endif

                 

    @endforeach
              
        </div>
    </div>
</div>
<br>
<div class="col-xl-6 m-auto text-center">
    <br>
    @include('includes.buttoms') 
</div>
  
    <br>

          
    </div>


@endsection


