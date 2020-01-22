<!-- Section: Block Content -->
<div class="card testimonial-card">

    <!--Bacground color-->
    <div class="card-up img-clover {{ sex_id_2_color_class(@$user->profile->sex_id) }}" @if(@$user->profile->imgur_cover && @$user->profile->imgur_cover_status) style="background-image: url({{ @Imgur::size($user->profile->imgur_cover, 'l') }});" @endif>
        <div class="img-gradient-overlay h-100 p-3 white-text">
            <p class="font-weight-normal mb-0">{{ @$user->profile->age }}, {{ @$user->profile->sex->name }}</p>
            <p class="small mb-0">{{ @$user->profile->province->title }}</p>
        </div>
    </div>

    <!--Avatar-->
    <div class="avatar mx-auto white">
        <img src="{{ @$user->profile->imgur ?? url('image/user-placeholder.png') }}" class="rounded-circle lazyload">
    </div>

    <div class="card-body">
        <!--Name-->
        <h4 class="card-title">{{ @$user->profile->display_name }}</h4>
        <!--Quotation-->
        <p class="introduce scrollbar-style">
            {{-- <i class="fas fa-quote-left"></i> --}}
            {{ @$user->profile->introduce }}
        </p>

        {!! icon_bar($user->socialInfo) !!}

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
                <p class="small text-uppercase mb-0">รักเลย</p>
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
                    @if(@Auth::user()->isLiking($user))
                        <a href="{{ url('unlike/'.@$user->id) }}">ไม่รักแล้ว</a>
                    @else
                        <a href="{{ url('like/'.@$user->id) }}">รักเลย</a>
                    @endif
                </small>
            </div>
            <div class="col-4 text-center">
                <small>
                    <a href="{{ url('chatwith/'.@$user->id) }}">ส่งข้อความ</a>
                </small>
            </div>
        </div>
        @endif

    </div>

</div>