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
                    <img src="{{ @Imgur::size($user->profile->imgur_cover, 'l') }}" class="img-fluid">
                    @endif
                </div>

                <!--Avatar-->
                <div class="avatar mx-auto white">
                    <img src="{{ @$user->profile->imgur ?? url('image/user-placeholder.png') }}" class="rounded-circle">
                </div>

                <div class="card-body">
                    <!--Name-->
                    <h4 class="card-title">{{ @$user->profile->display_name }}</h4>
                    <!--Quotation-->
                    <p>
                        {{-- <i class="fas fa-quote-left"></i> --}}
                        {{ @$user->profile->introduce }}
                    </p>

                    @if(@$user->facebook->status)
                    <a class="fb-ic mr-3" role="button"><i class="fab fa-lg fa-facebook-f"></i></a>
                    @endif

                    @if(@$user->line->status)
                    <a class="whatsapp-ic mr-3" role="button"><i class="fab fa-lg fa-line"></i></a>
                    @endif

                    @if(@$user->instagram->status)
                    <a class="ins-ic mr-3" role="button"><i class="fab fa-lg fa-instagram pink-text"></i></a>
                    @endif

                    @if(@$user->twitter->status)
                    <a class="tw-ic mr-3" role="button"><i class="fab fa-lg fa-twitter"></i></a>
                    @endif

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
                            <p class="font-weight-bold mb-0">0</p>
                            <p class="small text-uppercase mb-0">เลิฟ</p>
                        </div>
                    </div>
                    @if( @Auth::user()->id != $user->id )
                    <hr>
                    <div class="row">
                        <div class="col-4 text-center">
                            <small>
                            @if(@Auth::user()->isFollowing($user))
                                <a href="{{ url('unfollow/'.@$user->id) }}">เลิกติดตาม</a>
                            @else
                                <a href="{{ url('follow/'.@$user->id) }}">ติดตาม</a>
                            @endif
                            </small>
                        </div>
                        <div class="col-4 text-center border-left border-right">
                            <small>
                                <a href="{{ url('upvote/'.@$user->id) }}">ให้คะแนน</a>
                            </small>
                        </div>
                        <div class="col-4 text-center">
                            <small>
                                <a href="{{ url('downvote/'.@$user->id) }}">ลดคะแนน</a>
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
