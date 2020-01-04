@extends('layouts.app')

@section('content')
@include('messenger.partials.flash')

<ul class="list-unstyled friend-list">
    @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
</ul>
@stop

@push('js')
<!-- Chat CSS -->
<link href="{{ asset('MDB-Pro-4.9.0/MDB-Pro/css/addons-pro/chat.min.css') }}" rel="stylesheet">
@endpush
