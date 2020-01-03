@extends('layouts.app')

@section('content')

<div class="text-right">
    <a href="{{ url('zadmin/banner/create') }}" class="btn btn-primary">+ เพิ่มรายการ</a>
</div>

<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class="th-sm">Status</th>
            <th class="th-sm">Image</th>
            <th class="th-sm">Url</th>
            <th class="th-sm">SDate</th>
            <th class="th-sm">EDate</th>
            <th class="th-sm"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($banners as $banner)
        <tr>
            <td>
                <div class="custom-control custom-switch text-center">
                    <input name="status" type="checkbox" class="custom-control-input switch_status" id="status_{{ @$banner->id }}" value="1" {{ @$banner->status == 1 ? 'checked' : ''}} data-tb="banners" data-id="{{ @$banner->id }}">
                    <label class="custom-control-label" for="status_{{ @$banner->id }}"><label>
                </div>
            </td>
            <td><img src="{{ Imgur::size($banner->imgur, 's') }}"></td>
            <td>{{ $banner->url }}</td>
            <td>{{ $banner->start_date }}</td>
            <td>{{ $banner->end_date }}</td>
            <td>
                <a href="{{ url('zadmin/banner/' . $banner->id . '/edit') }}" class="btn btn-success btn-sm">แก้ไข</a>
                <form method="POST" action="{{ url('zadmin/banner/' . $banner->id) }}" accept-charset="UTF-8" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-sm" onclick="confirmDelete()">ลบ</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Status</th>
            <th>Image</th>
            <th>Url</th>
            <th>SDate</th>
            <th>EDate</th>
            <th></th>
        </tr>
    </tfoot>
</table>

@endsection

@push('css')
<!-- DataTables CSS -->
<link href="{{ asset('MDB-Pro-4.9.0/MDB-Pro/css/addons/datatables.min.css') }}" rel="stylesheet">
@endpush

@push('js')
<!-- DataTables JS -->
<script type="text/javascript" src="{{ asset('MDB-Pro-4.9.0/MDB-Pro/js/addons/datatables.min.js') }}"></script>
<script>
$(document).ready(function () {
    $('#dtBasicExample').DataTable();

    // ajax เปิด-ปิด สถานะ
    urlPath = window.location.protocol + "//" + window.location.host + "/";
    $(document).on('change', ".switch_status", function () {
        $.ajax({
            url: urlPath+"ajaxSwitchStatus",
            data:{ table : $(this).data('tb'), id : $(this).data('id'), status : $(this).prop('checked') },
            dataType: "json",
        });
    });
});
</script>
@endpush
