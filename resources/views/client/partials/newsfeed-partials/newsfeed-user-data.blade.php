<div class="user-data full-width">
    <div class="user-profile">
        <div class="username-dt">
            <div class="usr-pic">
                <img src="{{asset('storage/profileImages/'. $user->profile_pic)}}" alt="profile pic">
            </div>
        </div><!--username-dt end-->
        <div class="user-specs" style="margin-top: 20px">
            <h3>{{session()->get('user')->username}}</h3>
            <span>{{session()->get('user')->from}}</span>
        </div>
    </div><!--user-profile-partials end-->
    <ul class="user-fw-status">
        <li>
            <h4>Following</h4>
            <span>{{$followings["following"]}}</span>
        </li>
        <li>
            <h4>Followers</h4>
            <span>{{$followings["followers"]}}</span>
        </li>
        <li>
            <a href="{{route('profiles.show', session()->get('user')->username)}}" title="">View Profile</a>
        </li>
    </ul>
</div><!--user-data end-->
