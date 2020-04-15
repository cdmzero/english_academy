@if(count($users))
    @foreach ($users as $user)
            <a href=" {{ route('admin.userview',['id'=>$user->id]) }}">
                @if($user->image)
                <img src="{{ route('user.avatar',['filename'=>$user->image]) }}" class="rounded-circle" height="150px" width="150px"></img>
                @else
                <img src="../img/nopic.png" class="rounded-circle" height="150px" width="150px"></img>
                @endif
            </a>
            <h2 class="title">{{ $user->user_name}} {{ $user->surname }}</h2>
            @endforeach
        </div><!-- /.col-lg-4 -->
@endif
