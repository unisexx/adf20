@extends('layouts.app')

@section('content')

<div class="container my-5">

    <!-- Section: Block Content -->
    <section>
        <div class="card">
            <div class="card-header white d-flex justify-content-between">
                <p class="h5-responsive font-weight-bold mb-0">Direct Chat</p>
            </div>
            <div class="card-body chat-body chat-room-id-{{ $chatroom->id }}">
                @foreach($chatmsgs as $msg)
                    @include('include/__msg-chatmsg-box', ['msg' => $msg])
                @endforeach
            </div>
            <div class="card-footer white py-3">
                <form id="chatForm" action="" autocomplete="off">
                    <div class="form-group mb-0">
                        <textarea id="msg-input" class="form-control rounded-0" rows="1" placeholder="Type message..."></textarea>
                        <div class="text-right pt-2">
                            <button class="btn btn-primary btn-sm mb-0 mr-0">ส่งข้อความ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Section: Block Content -->

</div>

@endsection

@push('js')
<!-- ChatRoom -->
<script>
$(document).ready(function(){
    var socket = io('http://localhost:3000');
    // socket.emit('chat chatMessage','ส่งข้อความจากฝั่ง client');

    scollBottom('.card-body');

    // Enter to Submit
    $('#msg-input').keypress(function (e) {
        if (e.which == 13) {
            $('#chatForm').submit();
            return false;
        }
    });

    $('form#chatForm').submit(()=>{

        if($('#msg-input').val() === ''){
            return false;
        }

        $.post("{{ route('api.chat.create.message') }}", { 

            text: $('#msg-input').val(),
            chat_room_id : {{ $chatroom->id }},
            user_id: "{{ @Auth::user()->id }}",

        }, function(data, status, jqXHR) {// success callback

            // ส่งข้อมูลไป node server
            socket.emit('chatMessage', {
                chat_room_id : {{ $chatroom->id }},
                user_id: "{{ @Auth::user()->id }}",
                msg: $('#msg-input').val(),
                imgur: "{{ @Auth::user()->profile->imgur }}",
                display_name : "{{ @Auth::user()->profile->display_name }}",
                msg_create_at : data.created_at,
            });

            $('#msg-input').val('');
        });
        return false;
    });

    // รับข้อมูลจาก node server
    socket.on('chatMessage', (data)=>{
        // $('.chat-body').append( $('<li>').text(data.msg + data.imgur) );
        $.get("{{ url('loadmsg') }}",{ 
            msg_user_id: data.user_id, 
            msg_text: data.msg ,
            msg_create_at: data.msg_create_at,
            imgur: data.imgur,
            display_name: data.display_name,
        },function(data){
            $('.chat-room-id-{{ $chatroom->id }}').append( data );
            scollBottom('.chat-body');
        });
    });

});

function scollBottom(element){
    $(element).animate({ scrollTop: $(element)[0].scrollHeight}, 1000);
}
</script>
@endpush

@push('css')
<style>
.chat-body {
    position: relative;
    height: 300px;
    overflow: auto;
}

.card-img-35 {
    width: 35px;
}

.mt-3p {
    margin-top: 3px;
}
</style>
@endpush