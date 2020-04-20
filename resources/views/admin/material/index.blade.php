
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

                <div class="card-header text-center"><h4>Examination <strong>Material </strong>  
                    <a href=" {{ route('admin.material.create') }} " class="btn-email-result"><i class="fa fa-plus"></i></a>
                </h4>
                </div>
                
                    <div class="card-body">
                        <div class="container">
                        <div class="row col-md-13">
                            <table class="table table-striped custab">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Type</th>
                                    <th>Test Name</th>
                                    <th>Creator</th>
                                    <th>Num of Questions</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                        @foreach($tests as $test)                  
                                                <tr>
                                                    <td>
                                                        {{ $test->id }}
                                                    </td>
                                                    <td>
                                                        {{ $test->test_type }}
                                                    </td>
                                                    <td>
                                                        {{ $test->test_name }} 
                                                    </td>
                                                    <td>
                                                       {{ $test->user->nick }}
                                                    </td>
                                              
                                                    <td class="text-center">
                                                        {{$test->num_questions}}
                                                    </td>
                                                    <td>
                                                        {{$test->status}}
                                                    </td>
                                                    
                                                    <td class="text-center">
                                                    @if($test->status == 'Pending' && $test->user_id == Auth::user()->id )
                                                   
                                                    <a href="{{ route( 'admin.material.update',[ 'id' => $test->id ] ) }}" class='btn-social-menu btn-instagram btn-menu' ><i class="fa fa-edit"></i></a>
                                                        <a href="" class="btn-social-menu btn-email btn-menu"><i class="fa fa-plus-circle"></i></a>
                                                    @elseif($test->status == 'Complete' && $test->user_id == Auth::user()->id )
                                                     <a href="{{ route( 'admin.questions',[ 'test_id' => $test->id ] ) }}" class='btn-social-menu btn-instagram btn-menu' ><i class="fa fa-eye"></i></a>
                                                    @else
                                                        
                                                    @endif
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

                                <div class="mx-auto text-center" style="width:30%">
                                {{ $tests->links()}}
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


