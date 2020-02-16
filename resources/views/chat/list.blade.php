@extends('layouts.app')

@section('content')

<table id="dtBasicExample" class="table table-striped table-bordered nowrap" cellspacing="0" style="width:100%">
    <thead>
        <tr>
            <th class="th-sm">คุยกับ</th>
            <th class="th-sm">ข้อความล่าสุด</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rs as $chatroom)
        <tr>
            <td>
                <img class="rounded-circle" src="{{ @get_recipient_profile($chatroom)->imgur ?? url('image/user-placeholder.png') }}" height="35"> {{ @get_recipient_profile($chatroom)->display_name }}
            </td>
            <td>
                <div>
                    <img class="rounded-circle" src="{{ $chatroom->latestMsg->profile->imgur ?? url('image/user-placeholder.png') }}" height="35"> {{ @$chatroom->latestMsg->profile->display_name }}<br>
                    <i class="fas fa-quote-left"></i> {{ $chatroom->latestMsg->text }} - <small>{{ DBToDate($chatroom->latestMsg->created_at,true,true).'น.' }}</small>
                </div>
                <a class="text-primary" href="{{ url('chatroom/'.$chatroom->id) }}">ไปที่ห้องแชท</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>คุยกับ</th>
            <th>ข้อความล่าสุด</th>
        </tr>
    </tfoot>
</table>

@endsection
