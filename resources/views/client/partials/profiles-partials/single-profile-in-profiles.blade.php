<div class="col-lg-3 col-md-4 col-sm-6 col-12" id="{{$profile->user_id}}">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <div class="company_profile_info">
        <div class="company-up-info">
            <img src="{{asset('storage/profileImages/'.$profile->profile_pic)}}" alt="profile">
            <h3>{{$profile->username}}</h3>
            <h4>{{$profile->from}}</h4>
            <ul>
                @if($profile->followers->count() == 0)
                    <li class="follow" data-ux="{{$profile->user_id}}"
                        data-ut="{{session()->get('user')->user_id}}">
                        <a href="#" title="" class="flww">
                            <i class="la la-plus"></i>
                            Follow
                        </a>
                    </li>
                @endif
                @for($i = 0 ; $i<$profile->followers->count(); $i++)
                    @if($profile->followers[$i]->follower_id == session()->get('user')->user_id)
                        <li class="follow" data-ux="{{$profile->user_id}}"
                            data-ut="{{session()->get('user')->user_id}}">
                            <a href="#" title="" class="flww">
                                <i class="la la-check"></i>
                                Following
                            </a>
                        </li>
                        @break
                    @endif
                    @if($i == $profile->followers->count()-1)
                        <li class="follow" data-ux="{{$profile->user_id}}"
                            data-ut="{{session()->get('user')->user_id}}">
                            <a href="#" title="" class="flww">
                                <i class="la la-plus"></i>
                                Follow
                            </a>
                        </li>
                    @endif
                @endfor
            </ul>
        </div>
        <a href="{{route('profiles.show', $profile->username)}}" title="" class="view-more-pro">View Profile</a>
    </div><!--company_profile_info end-->
</div>

