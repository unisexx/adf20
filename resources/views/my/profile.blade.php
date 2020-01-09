@extends('layouts.app')

@section('content')

<div class="my-5">

    <!-- Section: Block Content -->
    <section>

        <form method="POST" action="{{ url('/my/profile_save') }}" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}


            <div class="card-cascade narrower card">

                <div data-test="view" class="view view-cascade mdb-color darken-3 card-header">
                    <h5 class="mb-0 font-weight-bold text-center text-white">ตัวอย่างการแสดงผล</h5>
                </div>

                {{-- <p class="h4 text-center py-4">ข้อมูลส่วนตัว</p> --}}
                <div class="card-body">

                    {{-- ตัวอย่าง --}}
                    <div class="container my-5">
                        <div class="row">
                            <div class="col-md-8 col-lg-6 mx-auto">
                                @include('include/__user-card', ['user' => @Auth::user()])
                            </div>
                        </div>
                    </div>
                    {{-- ตัวอย่าง --}}


                    <div class="md-form text-center">
                        @if( @Auth::user()->profile->imgur_cover )
                        <input type="hidden" name="old_imgur_cover" value="{{ @Auth::user()->profile->imgur_cover }}">
                        @endif
                        <div class="file-field">
                            <div class="btn btn-primary btn-sm float-left">
                                <span>อัพโหลดภาพปก</span>
                                <input type="file" name="imgUploadCover">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload your file">
                            </div>
                        </div>
                    </div>

                    <div class="text-center py-4 mt-3">
                        <button class="btn btn-primary btn-lg" type="submit">บันทึกข้อมูล</button>
                    </div>

                </div>
            </div>







            <div class="card-cascade narrower card mt-5">

                <div data-test="view" class="view view-cascade mdb-color darken-3 card-header">
                    <h5 class="mb-0 font-weight-bold text-center text-white">ตั้งค่าข้อมูลส่วนตัว</h5>
                </div>

                <div class="card-body">

                    <div class="md-form text-center">
                        @if( @Auth::user()->profile->imgur )
                        {{-- <img class="rounded-circle img-fluid z-depth-1" src="{{ Imgur::size(@Auth::user()->profile->imgur, 'b') }}">
                        --}}
                        <input type="hidden" name="old_imgur" value="{{ @Auth::user()->profile->imgur }}">
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
                        <input name="display_name" type="text" id="f2" class="form-control"
                            value="{{ @Auth::user()->profile->display_name }}">
                        <label for="f2" class="">ชื่อที่ใช้แสดงในเว็บ</label>
                    </div>

                    <div class="md-form md-outline">
                        <select name="sex_id" class="browser-default custom-select">
                            <option value="">เพศ</option>
                            @foreach ($sexes as $sex)
                            <option value="{{ $sex->id }}"
                                {{ $sex->id == @Auth::user()->profile->sex_id ? 'selected' : '' }}>{{ $sex->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md-form md-outline">
                        <input name="birth_date" placeholder="วันเกิด" type="text" id="date-picker-example"
                            class="form-control datepicker" value="{{ @Auth::user()->profile->birth_date }}">
                        <label for="date-picker-example">วันเกิด</label>
                    </div>

                    <div class="md-form md-outline">
                        <textarea name="introduce" type="text" id="f3" class="md-textarea form-control"
                            rows="5">{{ @Auth::user()->profile->introduce }}</textarea>
                        <label for="f3" class="">แนะนำตัว</label>
                    </div>

                    <div class="md-form md-outline">
                        <select name="province_id" class="browser-default custom-select">
                            <option value="">จังหวัด</option>
                            @foreach ($provinces as $province)
                            <option value="{{ $province->id }}"
                                {{ $province->id == @Auth::user()->profile->province_id ? 'selected' : '' }}>
                                {{ $province->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-center py-4 mt-3">
                        <button class="btn btn-primary btn-lg" type="submit">บันทึกข้อมูล</button>
                    </div>


                </div>
            </div>







            <div class="card-cascade narrower card mt-5">

                <div data-test="view" class="view view-cascade mdb-color darken-3 card-header">
                    <h5 class="mb-0 font-weight-bold text-center text-white">ข้อมูล Social</h5>
                </div>
                <div class="card-body">

                    <small id="helper" class="form-text text-muted mb-4">กรุณาตรวจสอบความถูกต้องของข้อมูล ถ้าใส่ข้อมูลไม่ถูกต้องเพื่อนจะแอดเราไม่ได้แล้วจะมีผลกับคะแนนความรักด้วยนะครับ</small>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text" style="height: 38px;">
                                <input name="social_info[status][facebook]" class="form-check-input" type="checkbox"
                                    value="1" id="facebook" {{ @Auth::user()->facebook->status ? 'checked' : '' }}>
                                <label class="form-check-label" for="facebook">
                            </div>
                        </div>
                        <input name="social_info[link][]" type="text" class="form-control" placeholder="FACEBOOK"
                            value="{{ @Auth::user()->facebook->link }}">
                        <input name="social_info[provider][]" type="hidden" value="facebook">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text" style="height: 38px;">
                                <input name="social_info[status][twitter]" class="form-check-input" type="checkbox"
                                    value="1" id="twitter" {{ @Auth::user()->twitter->status ? 'checked' : '' }}>
                                <label class="form-check-label" for="twitter">
                            </div>
                        </div>
                        <input name="social_info[link][]" type="text" class="form-control" placeholder="TWITTER"
                            value="{{ @Auth::user()->twitter->link }}">
                        <input name="social_info[provider][]" type="hidden" value="twitter">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text" style="height: 38px;">
                                <input name="social_info[status][line]" class="form-check-input" type="checkbox"
                                    value="1" id="line" {{ @Auth::user()->line->status ? 'checked' : '' }}>
                                <label class="form-check-label" for="line">
                            </div>
                        </div>
                        <input name="social_info[link][]" type="text" class="form-control" placeholder="LINE ID"
                            value="{{ @Auth::user()->line->link }}">
                        <input name="social_info[provider][]" type="hidden" value="line">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text" style="height: 38px;">
                                <input name="social_info[status][instagram]" class="form-check-input" type="checkbox"
                                    value="1" id="instagram" {{ @Auth::user()->instagram->status ? 'checked' : '' }}>
                                <label class="form-check-label" for="instagram">
                            </div>
                        </div>
                        <input name="social_info[link][]" type="text" class="form-control" placeholder="INSTAGRAM"
                            value="{{ @Auth::user()->instagram->link }}">
                        <input name="social_info[provider][]" type="hidden" value="instagram">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text" style="height: 38px;">
                                <input name="social_info[status][youtube]" class="form-check-input" type="checkbox"
                                    value="1" id="youtube" {{ @Auth::user()->youtube->status ? 'checked' : '' }}>
                                <label class="form-check-label" for="youtube">
                            </div>
                        </div>
                        <input name="social_info[link][]" type="text" class="form-control" placeholder="YOUTUBE"
                            value="{{ @Auth::user()->youtube->link }}">
                        <input name="social_info[provider][]" type="hidden" value="youtube">
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text" style="height: 38px;">
                                <input name="social_info[status][tiktok]" class="form-check-input" type="checkbox"
                                    value="1" id="tiktok" {{ @Auth::user()->tiktok->status ? 'checked' : '' }}>
                                <label class="form-check-label" for="tiktok">
                            </div>
                        </div>
                        <input name="social_info[link][]" type="text" class="form-control" placeholder="TIKTOK"
                            value="{{ @Auth::user()->tiktok->link }}">
                        <input name="social_info[provider][]" type="hidden" value="tiktok">
                    </div>


                    <div class="text-center py-4 mt-3">
                        <button class="btn btn-primary btn-lg" type="submit">บันทึกข้อมูล</button>
                    </div>

                </div>
            </div>






            <div class="card-cascade narrower card mt-5">

                <div data-test="view" class="view view-cascade mdb-color darken-3 card-header">
                    <h5 class="mb-0 font-weight-bold text-center text-white">สถานะการใช้งาน</h5>
                </div>
                <div class="card-body">

                    <!-- Material checked -->
                    <div class="custom-control custom-switch text-center">
                        <input name="publish" type="checkbox" class="custom-control-input" id="f4" value="1"
                            {{ @Auth::user()->profile->publish == 1 ? 'checked' : ''}}>
                        <label class="custom-control-label" for="f4">ปิด-เปิด การใช้งาน
                            (ถ้ายังไม่อยากให้คนอื่นเห็นเราให้กดปิด)<label>
                    </div>

                    <div class="text-center py-4 mt-3">
                        <button class="btn btn-primary btn-lg" type="submit">บันทึกข้อมูล</button>
                    </div>

                </div>
            </div>

            {!! app('captcha')->render(); !!}

        </form>
    </section>
    <!-- Section: Block Content -->

</div>

@endsection

@push('js')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\ProfileRequest') !!}

<script>
    // Data Picker Initialization
    var dateObj = new Date();
    var currentDay = dateObj.getUTCDate();
    var currentMonth = dateObj.getUTCMonth();
    var currentYear = dateObj.getUTCFullYear();
    var maxYear = currentYear - 18;
    var minYear = currentYear - 75;
    $('.datepicker').pickadate({
        // Strings and translations
        monthsFull: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม',
            'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
        ],
        monthsShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.',
            'ธ.ค.'
        ],
        weekdaysFull: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
        weekdaysShort: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
        selectYears: 75,
        min: new Date(minYear, currentMonth, currentDay),
        max: new Date(maxYear, currentMonth, currentDay),
        format: 'd mmmm, yyyy',
        formatSubmit: 'yyyy-mm-dd',
    })

</script>
@endpush
