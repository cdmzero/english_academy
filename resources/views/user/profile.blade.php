@extends('layouts.app')
@section('content')
<br>
<br>
<br>
<br>

<body>
    <div class="main-content">
    <div class="container mt-7">
    <!-- Table -->
    <div class="row">
    <div class="col-xl-8 m-auto order-xl-2 mb-5 mb-xl-0">
    <div class="card card-profile shadow">
    <div class="row justify-content-center">
    @if($user->image != null)
    <div class="mx-auto">
    <br>
    <br>
    <br>
        <img src="{{ route('user.avatar',['filename'=>$user->image]) }}" class="rounded-circle" height="150px" width="150px">
    </div>
    @endif
    </div>
    <div class="card-body pt-0 pt-md-4">
    <br>
    <div class="text-center">
    <h3>
     <strong>{{$user->user_name}}  {{$user->surname}}</strong>   
    <span class="font-weight-light"></span>
    </h3>
    <div class="h5 font-weight-300">
    <i class="ni location_pin mr-2">User Registered |<strong> {{ \FormatTime::LongTimeFilter($user->created_at) }} </strong></i>
    </div>
    <div class="h5 mt-4">
    <i class="ni business_briefcase-24 mr-2"></i>Nickname <strong>{{ $user->nick }}</strong>
    </div>
    <div>
    <i class="ni education_hat mr-2">Email <strong>{{ $user->email }}</strong></i>
</div>
<br>
<i class="ni education_hat mr-2"></i><h4>Results</h4>
        <!-- Table -->
    <div class="col-xl-8 m-auto order-xl-2 mb-5 mb-xl-0">
        <div class="row align-items-center">
        <table class="table table-striped custab">
        <thead>
            <tr>
                <th>Mark</th>
                <th>Test</th>
                <th>Obtained</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        @foreach ($results as $result)
        <tr>
            <td>{{$result->mark}} %</td>
            <td>{{$result->test->test_name}}</td>
            <td>{{ \FormatTime::LongTimeFilter($result->created_at) }}</td>
            <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
        </tr>
        @endforeach
        </table>
    <small>Data entry <strong>{{$cuenta}}</strong></small>
        </div>
        <div class="mx-auto" style="width: 20%">
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
    <div class="copyright">

    </div>
    </div>

    </div>
    </footer>

   

@endsection

