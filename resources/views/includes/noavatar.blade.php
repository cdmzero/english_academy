@if(Auth::user()->image == null)
<div class="container-avatar">
    <img src="{{asset ('img/nopic.png') }}" class="avatar" height="150px" width="150px">
</div>
@endif