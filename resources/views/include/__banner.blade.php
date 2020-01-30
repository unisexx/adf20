@php
$banners = DB::table('banners')
	->where('status', 1)
	->where('start_date_submit', '<=', \Carbon\Carbon::now())
    ->where('end_date_submit', '>=', \Carbon\Carbon::now())
    ->orderBy('id','asc')
	->get();
@endphp

@foreach($banners as $banner)
<div class="mb-2 text-center"><a href="{{ $banner->url }}" target="_blank"><img class="img-fluid" src="{{ $banner->imgur }}"></a></div>
@endforeach