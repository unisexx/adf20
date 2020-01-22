@php
    $msg_user_id = $msg->user_id ?? $_GET['msg_user_id'];
    $msg_text = $msg->text ?? $_GET['msg_text'];
    $msg_create_at = $msg->created_at ?? $_GET['msg_create_at'];
    $imgur = $msg->profile->imgur ?? $_GET['imgur'];
    $display_name = $msg->profile->display_name ?? $_GET['display_name'];
@endphp

@if( @Auth::user()->id != $msg_user_id )

<div class="media mt-3">
    <img class="avatar rounded-circle card-img-35 z-depth-1 d-flex mr-3"
        src="{{ $imgur ?? url('image/user-placeholder.png') }}" alt="Generic placeholder image">
    <div class="media-body">
        <p class="mt-0 font-weight-bold small mb-1">{{ $display_name }}<span
                class="text-muted float-right small mt-3p">{{ DBToDate($msg_create_at,true,true).'น.' }}</span></p>
        <p class="mb-0 font-weight-light small grey lighten-2 p-2 rounded">{{ $msg_text }}</p>
    </div>
</div>

@else

<div class="media mt-3">
    <div class="media-body">
        <p class="mt-0 font-weight-bold small mb-1"><span class="text-muted small mt-3p">{{ DBToDate($msg_create_at,true,true).'น.' }}</span>
        <span class="float-right">{{ $display_name }}</span></p>
        <p class="mb-0 font-weight-light small primary-color text-white p-2 rounded">{{ $msg_text }}</p>
    </div>
    <img class="avatar rounded-circle card-img-35 z-depth-1 d-flex ml-3"
        src="{{ $imgur ?? url('image/user-placeholder.png') }}" alt="Generic placeholder image">
</div>

@endif