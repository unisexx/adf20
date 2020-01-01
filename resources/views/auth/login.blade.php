@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <blockquote class="blockquote bq-warning">
                <p class="bq-title">คำเตือน!!!...</p>
                <p>ข้อมูลในเว็บไซต์ต่อไปนี้ อาจมีเนื้อหาบางส่วนที่ไม่เหมาะสมแก่ เด็ก และ เยาวชน ที่อายุต่ำกว่า 18 ปี ดังนั้น น้องคนไหนที่รู้ตัวว่าอายุต่ำกว่า 18 ปี ไม่ควรจะเข้ามาใช้งานนะครับ</p>
            </blockquote>

            <div class="col text-center">
                <a href="{{url('/redirect')}}" class="btn btn-lg btn-fb"><i class="fab fa-facebook-f pr-1"></i> เข้าสู่ระบบด้วย Facebook</a>
            </div>


        </div>
    </div>
</div>

@endsection
