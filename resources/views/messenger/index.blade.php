@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-3">
        <div class="list-group">
            <a href="#!" class="list-group-item list-group-item-action">ข้อความรับเข้า</a>
            <a href="#!" class="list-group-item list-group-item-action">ข้อความส่งออก</a>
        </div>
    </div>
    <div class="col-md-9">
        @include('messenger.partials.flash')
        {{-- <ul class="list-unstyled friend-list">
            @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
        </ul> --}}
        <table class="table">
            <thead>
                <tr>
                    <th>วันที่</th>
                    <th>หัวข้อ</th>
                    <th>ส่งไป</th>
                </tr>
            </thead>
            <tbody>
                @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
            </tbody>
        </table>
    </div>
</div>

@stop

@push('js')
<!-- Chat CSS -->
<link href="{{ asset('MDB-Pro-4.9.0/MDB-Pro/css/addons-pro/chat.min.css') }}" rel="stylesheet">
@endpush
