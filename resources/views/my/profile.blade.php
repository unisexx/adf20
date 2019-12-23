@extends('layouts.app')

@section('content')

<div class="container my-5">

    <!-- Section: Block Content -->
    <section>

        <form method="POST" action="{{ url('/my/profile_save') }}" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="card">
                <p class="h4 text-center py-4">ข้อมูลส่วนตัว</p>
                <div class="card-body">


                    {{-- ตัวอย่าง --}}
                    <div class="container my-5">
                        <div class="row">
                            <div class="col-md-8 col-lg-6 mx-auto">

                                <!-- Section: Block Content -->
                                <section>
                                    <div class="card testimonial-card">

                                        <!--Bacground color-->
                                        <div class="card-up indigo lighten-1">
                                        </div>

                                        <!--Avatar-->
                                        <div class="avatar mx-auto white">
                                            <img src="{{ @Auth::user()->profile->imgur }}" class="rounded-circle">
                                        </div>

                                        <div class="card-body">
                                            <!--Name-->
                                            <h4 class="card-title">{{ @Auth::user()->profile->display_name }}</h4>
                                            <hr>
                                            <!--Quotation-->
                                            <p>
                                                <i class="fas fa-quote-left"></i>
                                                {{ @Auth::user()->profile->introduce }}</p>
                                        </div>

                                    </div>

                                </section>
                                <!-- Section: Block Content -->

                            </div>
                        </div>
                    </div>
                    {{-- ตัวอย่าง --}}




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

                    <!-- Material checked -->
                    <div class="custom-control custom-switch">
                        <input name="publish" type="checkbox" class="custom-control-input" id="f4" value="1"
                            {{ @Auth::user()->profile->publish == 1 ? 'checked' : ''}}>
                        <label class="custom-control-label" for="f4">ปิด-เปิด การใช้งาน
                            (ถ้าไม่ต้องการหาเพื่อนแล้วให้กดปิด)</label>
                    </div>

                    <div class="text-center py-4 mt-3">
                        <button class="btn btn-primary" type="submit">บันทึกข้อมูล<i
                                class="fa fa-paper-plane-o ml-2"></i></button>
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
