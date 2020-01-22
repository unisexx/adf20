@extends('layouts.app')

@section('content')

<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class="th-sm">UserID</th>
            <th class="th-sm">DisplayName</th>
            <th class="th-sm no-sort"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($rs as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>
                <div class="chip chip-lg m-0">
                    <img src="{{ $user->profile->imgur ?? url('image/user-placeholder.png') }}" alt="Contact Person"> {{ @$user->profile->display_name }}
                </div>
            </td>
            <td>
                @if($user->isBanned())
                    <a href="{{ url('/zadmin/user/unban/'.$user->id) }}" class="btn btn-success btn-sm">Unban</a>
                @else
                    <a href="{{ url('/zadmin/user/ban/'.$user->id) }}" class="btn btn-danger btn-sm">Ban</a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>UserID</th>
            <th>DisplayName</th>
            <th></th>
        </tr>
    </tfoot>
</table>

@endsection
