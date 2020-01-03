@extends('layouts.app')

@section('content')

<div class="text-right">
    <a href="{{ url('zadmin/banner/create') }}" class="btn btn-primary">+ เพิ่มรายการ</a>
</div>

<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
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
            <td><img src="{{ $banner->imgur }}" width="200"></td>
            <td>{{ $banner->url }}</td>
            <td>{{ $banner->start_date }}</td>
            <td>{{ $banner->end_date }}</td>
            <td>
                <a href="{{ url('zadmin/banner/' . $banner->id . '/edit') }}" class="btn btn-success btn-sm">แก้ไข</a>
                <form method="POST" action="{{ url('zadmin/banner/' . $banner->id) }}" accept-charset="UTF-8" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-sm">ลบ</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
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
    });

</script>
@endpush
