@if(Auth::user()->image)
<div class="container-avatar">
    <img src="{{ route('user.avatar',['filename'=>Auth::user()->image]) }}" class="avatar"  width="150px" width="150px"> 
</div>
@endif