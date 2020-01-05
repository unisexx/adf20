@extends('layouts.app')

@section('content')
<div class="chat-room">
    <div class="card-body">

        <!-- Grid row -->
        <div class="row px-lg-2 px-2">

            <!-- Grid column -->
            <div class="col-md-6 col-xl-4 px-0 mb-3">

                <h6 class="font-weight-bold mb-3 text-center text-lg-left">ส่งข้อความถึง</h6>
                <div class="pr-3 pb-0">
                    @include('include/user-card', ['user' => $user])
                </div>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0">

                <div class="chat-message">

                    <ul class="list-unstyled chat">
                        <form action="{{ route('messages.store') }}" method="post">
                            {{ csrf_field() }}
                            <li class="">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" placeholder="เรื่อง" value="{{ old('subject') }}">
                                </div>

                                <div class="form-group basic-textarea">
                                    <textarea name="message" class="form-control pl-2 my-0" rows="3" placeholder="ข้อความ">{{ old('message') }}</textarea>
                                </div>
                            </li>
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