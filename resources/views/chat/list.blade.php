@extends('layouts.app')

@section('content')

<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class="th-sm">คุยกับ</th>
            <th class="th-sm">ข้อความล่าสุด</th>
            <th class="th-sm">เวลา</th>
            <th class="th-sm no-sort"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($rs as $chatroom)
        <tr>
            <td>
                @if($chatroom->from_user_id != Auth::user()->id)
                <div class="chip chip-lg m-0">
                    <img src="{{ $chatroom->fromProfile->imgur ?? url('image/user-placeholder.png') }}"> {{ @$chatroom->fromProfile->display_name }}
                </div>
                @endif

                @if($chatroom->to_user_id != Auth::user()->id)
                <div class="chip chip-lg m-0">
                    <img src="{{ $chatroom->toProfile->imgur ?? url('image/user-placeholder.png') }}"> {{ @$chatroom->toProfile->display_name }}
                </div>
                @endif
            </td>
            <td>
                <div class="chip chip-lg m-0">
                    <img src="{{ $chatroom->latestMsg->profile->imgur ?? url('image/user-placeholder.png') }}"> {{ @$chatroom->latestMsg->profile->display_name }} :: {{ $chatroom->latestMsg->text }}
                </div>
            </td>
            <td>
                {{ $chatroom->latestMsg->created_at }}
            </td>
            <td>
                <a href="{{ url('chatroom/'.$chatroom->id) }}" class="btn btn-success btn-sm">ส่งข้อความ</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>คุยกับ</th>
            <th>ข้อความล่าสุด</th>
            <th>เวลา</th>
            <th></th>
        </tr>
    </tfoot>
</table>

@endsection
