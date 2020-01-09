@extends('layouts.app')

@section('content')

<div class="card grey lighten-3 chat-room">
    <div class="card-body">

        <!-- Grid row -->
        <div class="row px-lg-2 px-2">

            <!-- Grid column -->
            <div class="col-md-6 col-xl-4 px-0 mb-5">

                <h6 class="font-weight-bold mb-3 text-center text-lg-left">ส่งข้อความถึง</h6>
                <div class="px-3 pt-3 pb-0">
                    @include('include/__user-card', ['user' => $user])
                </div>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0">

                <div class="chat-message">

                    <ul class="list-unstyled chat">

                        @each('messenger.partials.messages', $thread->messages, 'message')

                        <form action="{{ route('messages.update', $thread->id) }}" method="post">
                            {{ method_field('put') }}
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





    {{-- <div class="col-md-6">
        <h1>{{ $thread->subject }}</h1>
        @each('messenger.partials.messages', $thread->messages, 'message')

        @include('messenger.partials.form-message')
    </div> --}}
@stop
