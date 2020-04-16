@extends('layouts.app')
@section('content')
<br>
<br>
<br>
<br>

@php

@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    New <strong>Result</strong>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.results.store') }}"  method="POST">

                        @csrf
                       
                        <div class="form-group row">
                            <label for="test_id" class="col-md-4 col-form-label text-md-right">{{ __('Test Name') }}</label>

                            <div class="col-md-6">
                                <select name="test_id" id="test_id" class="form-control @error('test_id') is-invalid @enderror"  required>
                                <option selected>Choose...</option>
                                    @foreach ($tests as $test)
                                    <option value="{{$test->id}}">{{ $test->test_name }}</option>
                                    @endforeach
                                  </select>
                                @error('test_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }} </label>

                            <div class="col-md-6">
                                <select  name="user_id" id="user_id" class=" form-control @error('user_id') is-invalid @enderror" placeholder="choose" required>
                                <option selected>Choose...</option> --}}
                                    @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{ $user->user_name}} {{$user->surname }} | {{$user->email }}</option>
                                    @endforeach
                                  </select>
                                  @error('user_id')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror 
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="mark" class="col-md-4 col-form-label text-md-right">{{ __('Mark') }}</label>
                            <div class="col-md-6">
                                <div class="input-group mb-3 number-spinner">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-danger" data-dir="dwn" type="button">-</button>
                                    </div>
                                    <input id="mark"  class="form-control text-center @error('mark') is-invalid @enderror"  value="50.00" step="0.01" data-decimals="2" name="mark" max="100" min="0" required autocomplete="mark" autofocus/>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-success" data-dir="up" type="button">+</button>
                                    </div>    
                                    @error('mark')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror                          
                                </div>
                            </div>
                        </div>                            
                        <br><br>  
                        <div class="form-group row">

                                <div class="mx-auto" width="33px">
                                    <button type="submit" class="btn btn-success">
                                    Add 
                                    </button>
                                </div>
                    </div>
                    </form>
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
    <br>
   
    @include('includes.buttoms') 
</div>
@include('includes.script-spinner')


@endsection
