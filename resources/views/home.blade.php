@extends('layouts.app')

@section('content')

<section>
    <div class="d-flex flex-wrap">

        @foreach($users as $user)
        <div class="m-3 flex-fill" style="width:300px;">

            <!-- Section: Block Content -->
            <div class="card testimonial-card">

                <!--Bacground color-->
                <div class="card-up indigo lighten-1">
                    @if(@$user->profile->imgur_cover)
                    <img data-src="{{ @Imgur::size($user->profile->imgur_cover, 'l') }}" class="img-fluid lazyload">
                    @endif
                </div>

                <!--Avatar-->
                <div class="avatar mx-auto white">
                    <img data-src="{{ @$user->profile->imgur ?? url('image/user-placeholder.png') }}" class="rounded-circle lazyload">
                </div>

                <div class="card-body">
                    <!--Name-->
                    <h4 class="card-title">{{ @$user->profile->display_name }}</h4>
                    <!--Quotation-->
                    <p>
                        {{-- <i class="fas fa-quote-left"></i> --}}
                        {{ @$user->profile->introduce }}
                    </p>

                    {!! icon_bar($user) !!}

                    <hr>
                    <div class="row">
                        <div class="col-4 text-center">
                            <p class="font-weight-bold mb-0">{{ $user->following()->count() }}</p>
                            <p class="small text-uppercase mb-0">กำลังติดตาม</p>
                        </div>
                        <div class="col-4 text-center border-left border-right">
                            <p class="font-weight-bold mb-0">{{ $user->followers()->count() }}</p>
                            <p class="small text-uppercase mb-0">ผู้ติดตาม</p>
                        </div>
                        <div class="col-4 text-center">
                            <p class="font-weight-bold mb-0">{{ $user->likers()->count() }}</p>
                            <p class="small text-uppercase mb-0">ความรัก</p>
                        </div>
                    </div>
                    @if( @Auth::user()->id != $user->id )
                    <hr>
                    <div class="row">
                        <div class="col-6 text-center">
                            <small>
                            @if(@Auth::user()->isFollowing($user))
                                <a href="{{ url('unfollow/'.@$user->id) }}">เลิกติดตาม</a>
                            @else
                                <a href="{{ url('follow/'.@$user->id) }}">ติดตาม</a>
                            @endif
                            </small>
                        </div>
                        <div class="col-6 text-center border-left">
                            <small>
                                @if(@Auth::user()->isLiking($user))
                                    <a href="{{ url('unlike/'.@$user->id) }}">ไม่รักแล้ว</a>
                                @else
                                    <a href="{{ url('like/'.@$user->id) }}">รักเลย</a>
                                @endif
                            </small>
                        </div>
                    </div>
                    @endif

                </div>

            </div>

        </div>
        @endforeach

    </div>
</section>

@endsection
