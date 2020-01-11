@extends('layouts.app')

@section('content')

<div class="row justify-content-center mb-5 ">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Chat Message
            </div>
            <div class="card-body" style="height:200px; overflow-y:auto;">
                <div class="chat-body">
                    @foreach($msgs as $msg)
                    <li>{{ $msg->text }}</li>
                    @endforeach
                </div>
            </div>
            <div class="card-footer">
                <form id="chatForm" action="" autocomplete="off">
                    <div class="form-group">
                        <input id="msg-user-imgur" type="hidden" value="{{ @Auth::user()->profile->imgur }}">
                        <input id="msg-user-id" type="hidden" value="{{ @Auth::user()->id }}">
                        <input id="msg-input" type="text" class="form-control" placeholder="type your chat">
                        <button class="btn btn-primary btn-sm">ส่งข้อความ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<section>
    <div class="d-flex flex-wrap">

        @foreach($users as $user)
        <div class="m-3 flex-fill w-300px">
            @include('include/__user-card', ['user' => $user])
        </div>
        @endforeach

    </div>
</section>

@endsection
