@extends('layouts.app')
<br>
<br>
<br>
<br>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         
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
                <div class="card-header">Change Password</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('changePassword') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="cur_pass" class="col-md-4 col-form-label text-md-right">Current Password</label>

                            <div class="col-md-6">
                                <input id="cur_pass" type="password" class="form-control @error('cur_pass') is-invalid @enderror" name="cur_pass"  required autocomplete="cur_pass" autofocus>
                            <button type="button" 
                                    class="btn p-0 bg-transparent border-0 position-absolute" 
                                    style="top: 50%; right: 25px; transform: translateY(-50%)"
                                    onclick="togglePasswordVisibility('cur_pass', this)">👁️
                                    </button>
                                @error('cur_pass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New password</label>

                            <div class="col-md-6">
                                <input id="newpass" type="password" class="form-control @error('new_pass') is-invalid @enderror" name="newpass" required autocomplete="new-pass">
                                <button type="button" 
                                    class="btn p-0 bg-transparent border-0 position-absolute" 
                                    style="top: 50%; right: 25px; transform: translateY(-50%)"
                                    onclick="togglePasswordVisibility('newpass', this)">👁️
                                    </button>
                                @error('new_pass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="newpass_confirmation" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="newpass_confirmation" type="password" class="form-control" name="newpass_confirmation" required autocomplete="new-pass">
                                    <button type="button" 
                                    class="btn p-0 bg-transparent border-0 position-absolute" 
                                    style="top: 50%; right: 25px; transform: translateY(-50%)"
                                    onclick="togglePasswordVisibility('newpass_confirmation', this)">👁️
                                    </button>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Change Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection