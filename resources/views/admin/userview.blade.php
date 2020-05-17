@extends('layouts.app')

@section('content')

<br>
<br>
<br>
<br>
<body>
    <div class="main-content">
    <div class="container md-8">        
    <!-- Table -->
    <div class="row">
       
    <div class="col-xl-10 m-auto order-xl-2 mb-7 mb-xl-0">
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    <div class="card card-profile shadow">
    <div class="row justify-content-center">
        <br>
    @if($user->image != null)
    <div class="mx-auto">
    <br>
    <br>
        <img src="{{ route('user.avatar',['filename'=>$user->image]) }}" class="rounded-circle" height="150px" width="150px">
    </div>
    @else
    <div class="mx-auto">
        <br>
        <br>
    <img src="/img/nopic.png" class="rounded-circle" height="150px" width="150px"></img>
    </div>
    @endif
    </div>
    <div class="card-body pt-3 pt-md-4">
 
    <div class="text-center">
    <h3>
        {{$user->user_name}} 
    <span class="font-weight-light"> {{$user->surname}}</span>
    </h3>
    <div class="h5 font-weight-300">
    <i class="ni location_pin mr-2">Nickname <strong>{{ $user->nick }}</strong></i>
    </div>
    <div class="h5 mt-4">
    <i class="ni business_briefcase-24 mr-2">User registered | {{ \FormatTime::LongTimeFilter($user->created_at) }}</i>
    </div>
    <div>
    <i class="ni education_hat mr-2"></i>Email <strong>{{ $user->email }}</strong> 
    </div>
    <i class="ni education_hat mr-2"></i><h4>Results</h4>
        <!-- Table -->
        <br>
    <div class="col-xl-9 m-auto order-xl-2 mb-5 mb-xl-0">
        <div class="row align-items-center">
        <table class="table table-striped custab">
        <thead>
            <tr>
                <th>Mark</th>
                <th>Test</th>
                <th>Teacher</th>
                <th>Obtained</th>
                <th>Updated</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        @foreach ($results as $result)
        <tr>
            <td>{{$result->total_mark}} %</td>
            <td>{{$result->test->test_name}}</td>
            <td>{{$result->test->user->nick}}</td>
            <td>{{ \FormatTime::LongTimeFilter($result->created_at) }}</td>
            <td>{{ \FormatTime::LongTimeFilter($result->updated_at) }}</td>
            <td class="text-center">
            @if($result->test->user_id == Auth::user()->id || Auth::user()->role == 'admin' )
           <a class='btn-social-menu btn-instagram btn-menu' href="{{ route('admin.results.detail',['result_id' => $result->id, 'user' => 'u']) }}"><i class="fa fa-edit"></i></a>
           <a href="{{ route( 'exercise.result.index',[ 'result_id' => $result->id ] ) }}" class='btn-social-menu btn-email btn-menu'><i class="fa fa-eye"></i></a>

            @else
                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Sorry, you are not the right teacher for that :/">
                <a class='btn-social-menu btn-instagram btn-menu'><i class="fa fa-edit"></i></a>
                <a class='btn-social-menu btn-email btn-menu'><i class="fa fa-eye"></i></a>
            </span>
          
            @endif
            </td>
        </tr>
        @endforeach
        </table>
    <small>Data entry <strong>{{$cuenta}}</strong></small>
        </div>
        <div class="mx-auto" style="width:80%">
            {{ $results->links()}}
            </div> 
    </div>
    </body>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
    <div class="col-xl-6 m-auto text-center">
        <br>
        @include('includes.buttoms') 
    <div class="copyright">
    </div>
    </div>
    </div>
    </footer>
    </body>
    
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
          })
    </script>
@endsection
