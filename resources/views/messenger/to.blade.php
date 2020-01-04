@extends('layouts.app')

@section('content')
<div class="card grey lighten-3 chat-room">
    <div class="card-body">

        <!-- Grid row -->
        <div class="row px-lg-2 px-2">

            <!-- Grid column -->
            <div class="col-md-6 col-xl-4 px-0">

                <h6 class="font-weight-bold mb-3 text-center text-lg-left">ส่งข้อความถึง</h6>
                <div class="px-3 pt-3 pb-0">
                    @include('include/user-card', ['user' => $user])
                </div>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0">

                <div class="chat-message">

                    <ul class="list-unstyled chat">
                        <li class="d-flex justify-content-between mb-4">
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg" alt="avatar"
                                class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
                            <div class="chat-body white p-3 ml-2 z-depth-1">
                                <div class="header">
                                    <strong class="primary-font">Brad Pitt</strong>
                                    <small class="pull-right text-muted"><i class="far fa-clock"></i> 12 mins
                                        ago</small>
                                </div>
                                <hr class="w-100">
                                <p class="mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut
                                    labore et dolore magna aliqua.
                                </p>
                            </div>
                        </li>
                        <li class="d-flex justify-content-between mb-4">
                            <div class="chat-body white p-3 z-depth-1">
                                <div class="header">
                                    <strong class="primary-font">Lara Croft</strong>
                                    <small class="pull-right text-muted"><i class="far fa-clock"></i> 13 mins
                                        ago</small>
                                </div>
                                <hr class="w-100">
                                <p class="mb-0">
                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    doloremque
                                    laudantium.
                                </p>
                            </div>
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" alt="avatar"
                                class="avatar rounded-circle mr-0 ml-3 z-depth-1">
                        </li>
                        <li class="d-flex justify-content-between mb-4 pb-3">
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg" alt="avatar"
                                class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
                            <div class="chat-body white p-3 ml-2 z-depth-1">
                                <div class="header">
                                    <strong class="primary-font">Brad Pitt</strong>
                                    <small class="pull-right text-muted"><i class="far fa-clock"></i> 12 mins
                                        ago</small>
                                </div>
                                <hr class="w-100">
                                <p class="mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut
                                    labore et dolore magna aliqua.
                                </p>
                            </div>
                        </li>
                        <form action="{{ route('messages.store') }}" method="post">
                            {{ csrf_field() }}
                            <li class="white">
                                <div class="form-group basic-textarea">
                                    <textarea name="message" class="form-control pl-2 my-0" id="exampleFormControlTextarea2" rows="3"
                                        placeholder="Type your message here..."></textarea>
                                </div>
                            </li>
                            <input type="hidden" name="subject" value="{{ @Auth::user()->profile->display_name }} คุยกับ {{ $user->profile->display_name }}">
                            <input type="hidden" name="recipients" value="{{ $user->id }}">
                            <button type="submit" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right">Send</button>
                        </form>
                    </ul>

                </div>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
</div>
@stop

@push('js')
<!-- Chat CSS -->
<link href="{{ asset('MDB-Pro-4.9.0/MDB-Pro/css/addons-pro/chat.min.css') }}" rel="stylesheet">
@endpush