@extends('layouts.app')

@section('content')


<div class="container" style="margin-top:30px;">

    <h1 class="text-center text-success mb-4">เข้าสู่ระบบ</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                
                <!-- ลืมรหัสผ่าน -->
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                
            </div>
        </div>
    </form>

    <div class="st-divider"><span>หรือ</span></div>

    <div class="col text-center">
        <a href="{{ url('/redirect') }}" class="btn btn-link waves-effect btn-lg z-depth-1 text-dark"><img class="mr-2" src="{{ asset('image/facebook@2x.png') }}" width="30"> เข้าสู่ระบบด้วย Facebook</a>
    </div>
</div>

@endsection

@push('js')
<script>
$(document).ready(function(){
    Swal.fire({
        customClass: {
            confirmButton: 'btn btn-light-green waves-effect',
            cancelButton: 'btn btn-outline-success waves-effect ',
        },
        title: 'คำเตือน',
        html: "ข้อมูลในเว็บไซต์ต่อไปนี้ อาจมีเนื้อหาบางส่วนที่ไม่เหมาะสมแก่ เด็ก และ เยาวชน ที่อายุต่ำกว่า 18 ปี<br>เด็กที่อายุต่ำกว่า 18 ปีไม่อนุญาตให้ใช้งาน",
        icon: 'warning',
        reverseButtons: true,
        focusConfirm: false,
        allowOutsideClick: false,
        showCancelButton: true,
        cancelButtonText: 'ข้าพเจ้าอายุ 18+ ปี',
        confirmButtonText: 'ข้าพเจ้าอายุไม่ถึง 18 ปี',
        }).then((result) => {
        if (result.value) {
            window.location = "/";
        }
    })
});
</script>
@endpush