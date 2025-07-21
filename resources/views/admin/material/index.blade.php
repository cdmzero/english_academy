
@extends('layouts.app')
@section('content')
<br>
<br>
<br>
<br>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
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

                <div class="card-header text-center"><h4>Examination <strong>Material </strong>  
                    <a href=" {{ route('admin.material.create') }} " class="btn-email-result"><i class="fa fa-plus"></i></a>
                </h4>
                </div>
                
                    <div class="card-body">
                        <div class="container">
                        <div class="table-responsive">
                            <table class="table  table-striped custab  table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Type</th>
                                    <th>Test Name</th>
                                    <th>Teacher</th>
                                    <th>Questions</th>
                                    <th>Status</th>
                                    <th>Questions to be ready</th>
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
                                              
                                                    <td class="text-center mx-auto" style="width:15%">
                                                        {{$test->num_questions}}
                                                    <td>
                                                        @if( $test->status == "Pending" )
                                                        <span class="badge badge-primary">{{$test->status}}</span>
                                                        @else
                                                        <span class="badge badge-success">{{$test->status}}</span>
                                                        @endif 
                                                    </td>
                                                    <td class="text-center">
                                                    
                                                    @foreach ($status as $questions_to_go)
                                                    @if($test->id == $questions_to_go->id )
                                                        @if($questions_to_go->questions_count == 0 && $test->user_id == Auth::user()->id )
                                                        <form method="get" action="{{ route('admin.question.create',['test_id' => $test->id] )}}">  
                                                        <button type="submit" class="btn btn-primary btn-sm mx-auto " style="width:50%">
                                                            Make my first Question <span class="badge badge-success">{{ $test->num_questions }}</span>
                                                        </button>
                                                        </form>
                                                        
                                                        @elseif( $questions_to_go->questions_count == $test->num_questions)
                                                            @if($test->status == 'Public')

                                                            @else
                                                            <span class="badge badge-pill badge-success">Ready to be public</span>
                                                            @endif
                                                        @else
                                                            @if($test->user_id == Auth::user()->id)
                                                        <form method="get" action="{{ route('admin.question.create',['test_id' => $test->id] )}}">
                                                        <button type="submit" class="btn btn-primary btn-sm mx-auto" style="width:50%">
                                                            Make other question  <span class="badge badge-success"> 
                                                                {{ $test->num_questions - $questions_to_go->questions_count}}
                                                            </span>
                                                          </button>
                                                        </form>
                                                            @endif
                                                        @endif
                                                    @endif
                                                    @endforeach
                                                     </td>  

                                                <td class="text-center">
                                                    @if($test->status == 'Pending' && $test->user_id == Auth::user()->id || $test->status == 'Pending' && Auth::user()->role == "admin")
                                                    
                                                        @if($questions_to_go->questions_count == 0 )
                                                        <a href="{{ route( 'admin.material.update',[ 'test_id' => $test->id ] ) }}" class='btn-social-menu btn-instagram btn-menu' ><i class="fa fa-edit"></i></a>
                                                        <a href="{{ route( 'admin.questions',[ 'test_id' => $test->id ] ) }}" class='btn-social-menu btn-email btn-menu' ><i class="fa fa-eye"></i></a>

                                                        @else
                                                    <a href="{{ route( 'admin.material.update',[ 'test_id' => $test->id ] ) }}" class='btn-social-menu btn-instagram btn-menu' ><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route( 'admin.questions',[ 'test_id' => $test->id ] ) }}" class='btn-social-menu btn-email btn-menu' ><i class="fa fa-eye"></i></a>
                                                        @endif
                                                    @elseif( $test->status == 'Complete' && $test->user_id == Auth::user()->id || $test->status == 'Complete' && Auth::user()->role == 'admin' )
                                                   
                                                    <a href="{{ route( 'admin.material.update',[ 'test_id' => $test->id ] ) }}" class='btn-social-menu btn-instagram btn-menu' ><i class="fa fa-edit"></i></a>
                                                     <a href="{{ route( 'admin.questions',[ 'test_id' => $test->id ] ) }}" class='btn-social-menu btn-email btn-menu' ><i class="fa fa-eye"></i></a>
                                                   @else
                                                        @if($test->status == 'Public')
                                                            <a href="{{ route( 'admin.questions',[ 'test_id' => $test->id ] ) }}" class='btn-social-menu btn-email btn-menu' ><i class="fa fa-eye"></i></a>
                                                        @endif
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


