@extends('layouts.app')

@section('content')

<div class="container my-5">

    <!-- Section: Block Content -->
    <section>
        <form method="POST" action="{{ url('/my/profile_save') }}" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="card card-list">
                <div class="card-header white d-flex justify-content-between align-items-center py-3">
                    <p class="h5-responsive font-weight-bold mb-0">form</p>
                </div>
                <div class="card-body">

                    <div class="md-form">
                        @if( @Auth::user()->profile->imgur )
                            <img class="rounded-circle img-fluid" src="{{ Imgur::size(@Auth::user()->profile->imgur, 'b') }}">
                        @endif
                        <div class="file-field">
                            <div class="btn btn-primary btn-sm float-left">
                                <span>อัพโหลดภาพประจำตัว</span>
                                <input type="file" name="imgUpload">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload your file">
                            </div>
                        </div>
                    </div>
                    <div class="md-form md-outline">
                        <input name="display_name" type="text" id="f2" class="form-control" value="{{ @Auth::user()->profile->display_name }}">
                        <label for="f2" class="">ชื่อ</label>
                    </div>
                    <div class="md-form md-outline">
                        <textarea name="introduce" type="text" id="f3" class="md-textarea form-control" rows="5">{{ @Auth::user()->profile->introduce }}</textarea>
                        <label for="f3" class="">แนะนำตัว</label>
                    </div>
                    <!-- Material checked -->
                    <div class="custom-control custom-switch">
                        <input name="publish" type="checkbox" class="custom-control-input" id="customSwitch1" value="1" {{ @Auth::user()->profile->introduce == 1 ? 'checked' : ''}}>
                        <label class="custom-control-label" for="customSwitch1">ปิด-เปิด การใช้งาน (ถ้าไม่ต้องการหาเพื่อนแล้วให้กดปิด)</label>
                    </div>

                </div>
                
                <div class="card-footer white py-3">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-md px-3 my-0 mr-0">บันทึก</button>
                    </div>
                </div>
            </div>

        </form>
    </section>
    <!-- Section: Block Content -->

</div>

@endsection

@push('js')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\ProfileRequest') !!}
@endpush