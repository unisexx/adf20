@extends('layouts.app')

@section('content')

<div class="container my-5">

    <!-- Section: Block Content -->
    <section>

        <div class="card card-list">
            <div class="card-header white d-flex justify-content-between align-items-center py-3">
                <p class="h5-responsive font-weight-bold mb-0">ข้อมูลส่วนตัว</p>
            </div>
            <div class="card-body">
                <div class="md-form md-outline">
                    <input type="text" id="f2" class="form-control">
                    <label for="f2" class="">ชื่อ</label>
                </div>
                <div class="md-form md-outline">
                    <textarea type="text" id="f3" class="md-textarea form-control" rows="3"></textarea>
                    <label for="f3" class="">แนะนำตัว</label>
                </div>
            </div>
            <div class="card-footer white py-3">
                <div class="text-right">
                    <button class="btn btn-primary btn-md px-3 my-0 mr-0">Send<i class="fas fa-paper-plane pl-2"></i></button>
                </div>
            </div>
        </div>

    </section>
    <!-- Section: Block Content -->

</div>

@endsection

@push('scripts')
<script>
// TinyMCE Initialization
tinymce.init({ selector:'#post_content', menubar: false, height : "294" });
</script>
@endpush