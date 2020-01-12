@extends('layouts.app')

@section('content')

<section>
    <div class="d-flex flex-wrap">

        @foreach($users as $user)
        <div class="m-3 flex-fill w-300px">
            @include('include/__user-card', ['user' => $user])
        </div>
        @endforeach

    </div>
</section>

@endsection
