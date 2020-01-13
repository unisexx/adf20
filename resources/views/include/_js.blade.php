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
<!-- DataTables JS -->
<script type="text/javascript" src="{{ asset('MDB-Pro-4.9.0/MDB-Pro/js/addons/datatables.min.js') }}"></script>
<script>
$(document).ready(function () {
    $("#dtBasicExample").DataTable({
        "order": [],
        "columnDefs": [{
            "orderable": false,
            "targets": 'no-sort'
        }],
    });
});
</script>
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