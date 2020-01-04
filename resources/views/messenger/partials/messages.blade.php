{{-- <div class="media">
    <a class="pull-left" href="#">
        <img src="//www.gravatar.com/avatar/{{ md5($message->user->email) }} ?s=64"
             alt="{{ $message->user->name }}" class="img-circle">
    </a>
    <div class="media-body">
        <h5 class="media-heading">{{ $message->user->name }}</h5>
        <p>{{ $message->body }}</p>
        <div class="text-muted">
            <small>Posted {{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div> --}}


@if( @$message->user->id == @Auth::user()->id )

<li class="d-flex justify-content-between mb-4">
    <div class="chat-body white p-3 z-depth-1 w-100">
        <div class="header">
            <strong class="primary-font">{{ @$message->user->profile->display_name }}</strong>
            <small class="pull-right text-muted"><i class="far fa-clock"></i> {{ @$message->created_at->diffForHumans() }}</small>
        </div>
        <hr class="w-100">
        <p class="mb-0">
            {{ @$message->body }}
        </p>
    </div>
    <img src="{{ @$message->user->profile->imgur ?? url('image/user-placeholder.png') }}" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1 align-self-start" width="120">
</li>

@else

<li class="d-flex justify-content-between mb-4">
    <img src="{{ @$message->user->profile->imgur ?? url('image/user-placeholder.png') }}" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1 align-self-start" width="120">
    <div class="chat-body white p-3 ml-2 z-depth-1 w-100">
        <div class="header">
            <strong class="primary-font">{{ @$message->user->profile->display_name }}</strong>
            <small class="pull-right text-muted"><i class="far fa-clock"></i> {{ @$message->created_at->diffForHumans() }}</small>
        </div>
        <hr class="w-100">
        <p class="mb-0">
            {{ @$message->body }}
        </p>
    </div>
</li>


@endif