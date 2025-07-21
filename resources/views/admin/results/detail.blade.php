@extends('layouts.app')
@section('content')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>

<div class="my-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif

            <form action="{{ route('admin.results.update') }}" method="post">

                @csrf

            <div class="card">
                <div class="card-header"><strong> {{ $result->test->test_name}} </strong> results </div>
                    <div class="card-body">
                        <div class="container">
                        <div class="row col-md-13">

                            <table class="table table-striped custab">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th class="text-center">Mark</th>
                                    <th>Obtained</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                                                    
                                                <tr>
                                                    <td>
                                                        {{ $result->id }}
                                                    </td>
                                                    <td>{{ $result->user->user_name }} {{ $result->user->surname }}</td>
                                                    <td class="text-center">{{ $result->total_mark }} %</td>
                                                    <td>{{ \FormatTime::LongTimeFilter($result->created_at) }}</td>
                                                    @if(!empty($user))
                                                    <td class="text-center"><a class='btn-social-menu btn-lastfm btn-menu' href="{{ route('admin.results.delete',['result_id' => $result->id, 'user_id' => $result->user_id]) }}"><i class="fa fa-trash"></i> 
                                                    @else
                                                    <td class="text-center"><a class='btn-social-menu btn-lastfm btn-menu' href="{{ route('admin.results.delete',['result_id' => $result->id]) }}"><i class="fa fa-trash">
                                                    @endif                              
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input id="id" type="hidden" name="id" value="{{ $result->id }}">
                                                    </td>
                                                    <td>{{ $result->user->user_name }} {{ $result->user->surname }}</td>
                                                    <td>
                                                        <div class="input-group mb-3 number-spinner">
                                                            <div class="input-group-prepend">
                                                                <button class="btn btn-outline-danger" data-dir="dwn" type="button">-</button>
                                                            </div>
                                                            <input id="mark"  class="form-control text-center @error('mark') is-invalid @enderror"  value="{{ $result->total_mark }}" step="0.01" data-decimals="2" name="mark" max="100" min="0" required autocomplete="mark" autofocus/>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-success" data-dir="up" type="button">+</button>
                                                            </div>
                                                             @error('mark')
                                                                <span class="invalid-feedback text-center" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror 
                                                        </div>
                                                     </td>
                                                     <td>
                                                        @if(!empty($user))
                                                        <input id="user" type="hidden" name="user" value="u">
                                                        @endif
                                                     </td>
                                                    <td class="text-center">
                                                     
                                                    <button class='btn-instagram btn-social-menu btn-menu' type="submit"><i class="fa fa-edit"></i></a></button>
                                                </form>
                                                    <br>
                                                    @if(!empty($user))
                                                        <a class="btn btn-sencond" href=" {{ route('admin.userview',['id' => $result->user_id]) }}" >Exit </a>
                                                    @else
                                                        <a class="btn btn-sencond" href="{{ route('admin.results.menu',['id' => $result->test->id]) }}" >Exit </a>
                                                    @endif
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
       
        @include('includes.buttoms') 
    </div>
</div>
@include('includes.script-spinner')

@endsection


