<div class="main-left-sidebar">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <div class="user_profile">
        <div class="user-pro-img">
            <img
                src="{{asset('storage/profileImages/'. $user->profile_pic)}}"
                alt="profile">
        </div><!--user-pro-img end-->
        <div class="user-tab-sec">
            <h3>{{$user->username}}</h3>
            <div class="star-descp">
                <span>{{$user->from}}</span>
            </div><!--star-descp end-->
            <ul class="flw-hr">
                @if(!(session()->get('user')->username == $user->username))
                    @for($i = 0 ; $i<$followers->count(); $i++)
                        @if($followers[$i]->follower_id == session()->get('user')->user_id)
                            <li class="follow" data-ux="{{$user->user_id}}"
                                data-ut="{{session()->get('user')->user_id}}">
                                <a href="#" title="" class="flww">
                                    <i class="la la-check"></i>
                                    Following
                                </a>
                            </li>
                            @break
                        @endif
                        @if($i == $followers->count()-1)
                                <li class="follow" data-ux="{{$user->user_id}}"
                                    data-ut="{{session()->get('user')->user_id}}">
                                    <a href="#" title="" class="flww">
                                        <i class="la la-plus"></i>
                                        Follow
                                    </a>
                                </li>
                        @endif
                    @endfor
                    @if($followers->isEmpty())
                        <li class="follow" data-ux="{{$user->user_id}}"
                            data-ut="{{session()->get('user')->user_id}}">
                            <a href="#" title="" class="flww">
                                <i class="la la-plus"></i>
                                Follow
                            </a>
                        </li>
                    @endif
                @endif
            </ul>
            <div class="tab-feed">
                <ul>
                    <li data-tab="feed-dd" class="active">
                        <a href="#" title="">
                            <img src="{{asset('assets/images/ic1.png')}}" alt="">
                            <span>Feed</span>
                        </a>
                    </li>
                    <li data-tab="info-dd">
                        <a href="#" title="">
                            <img src="{{asset('assets/images/ic2.png')}}" alt="">
                            <span>Info</span>
                        </a>
                    </li>
                    <li data-tab="portfolio-dd">
                        <a href="#" title="">
                            <img src="{{asset('assets/images/ic3.png')}}" alt="">
                            <span>Gallery</span>
                        </a>
                    </li>
                </ul>
            </div><!-- tab-feed end-->
            <div class="user_pro_status">
                <ul class="flw-status">
                    <li>
                        <span>Following</span>
                        <b>{{$followings['following']}}</b>
                    </li>
                    <li>
                        <span>Followers</span>
                        <b>{{$followings['followers']}}</b>
                    </li>
                    <li>
                        <span>Posts</span>
                        <b>{{$post->count()}}</b>
                    </li>
                </ul>
            </div><!--user_pro_status end-->
        </div><!--user-tab-sec end-->
    </div><!--user_profile end-->
</div><!--main-left-sidebar end-->
