
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

                <div class="card-header text-center"><strong> <h4> {{ $test->test_name }} </strong> results 
                </h4>
                </div>
                
                    <div class="card-body">
                        <div class="container">
                        <div class="row col-md-13">
                        <table class="table table-striped custab">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Mark</th>
                                    <th>Obtained</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                        @foreach($results as $result)                  
                                                <tr>
                                                    <td>
                                                        {{ $result->id }}
                                                    </td>
                                                    <td>
                                                        {{ $result->user->user_name }} {{ $result->user->surname }}
                                                    </td>
                                                    <td>
                                                        {{ $result->total_mark }} %
                                                    </td>
                                                    <td>
                                                        {{  \FormatTime::LongTimeFilter($result->created_at) }}
                                                    </td>
                                                    <td class="text-center">
                                                        @if($test->user_id == Auth::user()->id || Auth::user()->role == 'admin')
                                                        <a class='btn-social-menu btn-instagram btn-menu' href="{{ route('admin.results.detail',['result_id' => $result->id]) }}"><i class="fa fa-edit"></i></a>
                                                        
                                                        @endif
                                                        

                                                    <a href="{{ route('admin.userview',['id' => $result->user_id]) }}" class="btn-social-menu btn-email btn-menu"><i class="fa fa-user"></i></a>
                                                    </td>   
                                                                            
                                        @endforeach
                                                </tr>
                                </tbody>        
                            </table>

                            @if($cuenta == 0)
                                <strong> No data entry for this exam </strong>   
                                <br> 
                            @else
                                <small> Total data entry {{ $cuenta }} </small>

                                <div class="mx-auto text-center" style="width:70%">
                                {{ $results->links()}}
                                </div> 
                            @endif
                            
                   

        </div>
        </div>
        </div>
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


