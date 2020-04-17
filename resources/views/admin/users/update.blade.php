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
                <div class="card-header">
                Update <strong>User</strong>               
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.save_update') }}" enctype="multipart/form-data" >
                        @csrf
                            <div class="text-center">
                    @if($user->image)
                        
                            @include('includes.avatar')

                    @else
             
                            <img src="../img/nopic.png" class="rounded-circle" height="150px" width="150px"></img>
           
                    @endif
                   <br>
                </div>
                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                    <div class="col-md-6">
                        <input type="hidden" name="id" value="{{ $user->id }}"> 
                        
                 
                    <div class="btn-group btn-group-toggle  @error('role') is-invalid @enderror" data-toggle="buttons" required>
                        <label class="btn btn-secondary active">
                          <input type="radio" name="role" id="user" value="user" {{ $user->role == 'user' ? 'checked' : '' }}> User
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="role" id="admin" value="admin" {{ $user->role == 'admin' ? 'checked' : '' }}> Admin
                        </label>
                    </div>     
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>                               
                </div>
           

                        <div class="form-group row">
                            <label for="user_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" placeholder="Name" value="{{ $user->user_name }}" required autocomplete="user_name" autofocus>

                                @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" placeholder="Surname" value="{{ $user->surname }}" required autocomplete="name" autofocus>
                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nick" class="col-md-4 col-form-label text-md-right">{{ __('Nick') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('nick') is-invalid @enderror" name="nick" placeholder="Nick" value="{{ $user->nick }}" required autocomplete="name" autofocus>

                                @error('nick')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" placeholder="example@example.com">
                              
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="form-group row">

                            <label for="image_path" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>
                            <div class="col-md-6">
  
                                    <div class="custom-file @error('image_path') is-invalid @enderror">
                                      <input type="file" class="custom-file-input" name="image_path" autofocus>
                                      <label class="custom-file-label" for="image">Choose file</label>
                                    </div>               

                                @error('image_path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                          <br><br>  

                                    <div class="text-center">
                                        <button type="submit mx-auto" class="btn btn-success">
                                        Update 
                                        </button>
                                  
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="col-xl-6 m-auto text-center">

       
    <br>
    <br>
    <br>
     @include('includes.buttoms') 
  
 </div>
<script type="application/javascript">
// Script para que aparezca el nombre de la imagen en el input 
    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
</script>




@endsection
