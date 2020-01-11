<!-- Socket IO -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
<!-- jQuery -->
<script type="text/javascript" src="{{ asset('MDB-Pro-4.9.0/MDB-Pro/js/jquery.min.js') }}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{ asset('MDB-Pro-4.9.0/MDB-Pro/js/popper.min.js') }}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ asset('MDB-Pro-4.9.0/MDB-Pro/js/bootstrap.min.js') }}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{ asset('MDB-Pro-4.9.0/MDB-Pro/js/mdb.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- Lazy Image Load -->
<script type="text/javascript" src="{{ asset('js/lazysizes.min.js') }}" async=""></script>
<!-- Your custom scripts (optional) -->
<script type="text/javascript">
function confirmDelete() {
    event.preventDefault(); // prevent form submit
    var form = event.target.form; // storing the form
    Swal.fire({
    title: 'ยืนยันการลบข้อมูล?',
    text: "หลังจากที่ลบไปแล้วจะไม่สามารถดึงข้อมูลนี้กลับมาได้อีก!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'ลบเลย',
    cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.value) {
            form.submit();
        }
    });
}
</script>

<!-- ChatRoom -->
<script>
$(document).ready(function(){

    scollBottom('.card-body');

    var socket = io('http://localhost:3000');
    // socket.emit('chat chatMessage','ส่งข้อความจากฝั่ง client');

    $('form#chatForm').submit(()=>{
        $.post("{{ url('/api/create/message') }}", { 

            text: $('#msg-input').val(),
            user_id: $('#msg-user-id').val(),

        }, function(data, status, jqXHR) {// success callback

            // ส่งข้อมูลไป node server
            socket.emit('chatMessage', {
                msg: $('#msg-input').val(),
                imgur: $('#msg-user-imgur').val()
            });

            $('#msg-input').val('');
            scollBottom('.card-body');
        });
        return false;
    });

    // รับข้อมูลจาก node server
    socket.on('chatMessage', (data)=>{
        $('.chat-body').append( $('<li>').text(data.msg + data.imgur) );
    });

});

function scollBottom(element){
    $(element).animate({ scrollTop: $(element)[0].scrollHeight}, 500);
}
</script>