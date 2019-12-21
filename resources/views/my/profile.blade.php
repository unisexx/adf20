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

                    <div class="md-form">
                        @if( @Auth::user()->profile->imgur )
                            <img class="rounded-circle img-fluid" src="{{ Imgur::size(@Auth::user()->profile->imgur, 'b') }}">
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
                        <input name="display_name" type="text" id="f2" class="form-control" value="{{ @Auth::user()->profile->display_name }}">
                        <label for="f2" class="">ชื่อที่ใช้แสดงในเว็บ</label>
                    </div>

                    <div class="md-form md-outline">
                        <select name="sex_id" class="browser-default custom-select">
                            <option value="">เพศ</option>
                            @foreach ($sexes as $sex)
                                <option value="{{ $sex->id }}" {{ $sex->id == @Auth::user()->profile->sex_id ? 'selected' : '' }}>{{ $sex->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="md-form md-outline">
                        <textarea name="introduce" type="text" id="f3" class="md-textarea form-control" rows="5">{{ @Auth::user()->profile->introduce }}</textarea>
                        <label for="f3" class="">แนะนำตัว</label>
                    </div>

                    <div class="md-form md-outline">
                        <select name="province_id" class="browser-default custom-select">
                            <option value="">จังหวัด</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}" {{ $province->id == @Auth::user()->profile->province_id ? 'selected' : '' }}>{{ $province->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Material checked -->
                    <div class="custom-control custom-switch">
                        <input name="publish" type="checkbox" class="custom-control-input" id="f4" value="1" {{ @Auth::user()->profile->publish == 1 ? 'checked' : ''}}>
                        <label class="custom-control-label" for="f4">ปิด-เปิด การใช้งาน (ถ้าไม่ต้องการหาเพื่อนแล้วให้กดปิด)</label>
                    </div>

                    <div class="text-center py-4 mt-3">
                        <button class="btn btn-primary" type="submit">บันทึกข้อมูล<i class="fa fa-paper-plane-o ml-2"></i></button>
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