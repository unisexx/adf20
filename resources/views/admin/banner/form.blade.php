@extends('layouts.app')

@section('content')

<div class="my-5">

    <!-- Section: Block Content -->
    <section>

        <form method="POST" action="{{ url('/zadmin/banner') }}" accept-charset="UTF-8"
            enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="card-cascade narrower card mt-5">

                <div data-test="view" class="view view-cascade mdb-color lighten-3 card-header">
                    <h5 class="mb-0 font-weight-bold text-center text-white">ฟอร์มแบนเนอร์</h5>
                </div>

                <div class="card-body">

                    <div class="md-form text-center">
                        @if( @$rs->imgur )
                        <img class="img-fluid" src="{{ Imgur::size($rs->imgur, 'b') }}">
                        <input type="hidden" name="old_imgur" value="{{ $rs->imgur }}">
                        @endif
                        <div class="file-field">
                            <div class="btn btn-primary waves-effect float-left">
                                <span>อัพโหลดภาพแบนเนอร์<i class="fas fa-cloud-upload-alt ml-2" aria-hidden="true"></i></span>
                                <input type="file" name="imgUpload">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload your file">
                            </div>
                        </div>
                    </div>

                    <div class="md-form md-outline">
                        <input name="url" type="text" id="f2" class="form-control"
                            value="{{ @$rs->url }}">
                        <label for="f2" class="">URL</label>
                    </div>

                    <div class="md-form md-outline">
                        <input name="start_date" type="text" id="start_date"
                            class="form-control datepicker" value="{{ @$rs->start_date }}">
                        <label for="start_date">วันที่เริ่ม</label>
                    </div>

                    <div class="md-form md-outline">
                        <input name="end_date" type="text" id="end_date"
                            class="form-control datepicker" value="{{ @$rs->end_date }}">
                        <label for="end_date">วันที่สิ้นสุด</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input name="publish" type="checkbox" class="custom-control-input" id="status" value="1"
                            {{ @$rs->status == 1 ? 'checked' : ''}}>
                        <label class="custom-control-label" for="status">สถานะ ปิด-เปิด<label>
                    </div>

                    <div class="text-center py-4 mt-3">
                        <input type="hidden" name="id" value="{{ @$rs->id }}">
                        <button class="btn btn-primary btn-lg" type="submit">บันทึกข้อมูล</button>
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
{!! JsValidator::formRequest('App\Http\Requests\BannerRequest') !!}

<script>
    // Data Picker Initialization
    var dateObj = new Date();
    var currentDay = dateObj.getUTCDate();
    var currentMonth = dateObj.getUTCMonth();
    var currentYear = dateObj.getUTCFullYear();
    var maxYear = currentYear + 5;
    var minYear = currentYear - 5;
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
        selectYears: 10,
        min: new Date(minYear, currentMonth, currentDay),
        max: new Date(maxYear, currentMonth, currentDay),
        format: 'd mmmm, yyyy',
        formatSubmit: 'yyyy-mm-dd',
    })

</script>
@endpush
