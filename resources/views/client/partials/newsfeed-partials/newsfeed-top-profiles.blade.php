<div class="top-profiles">
    <div class="pf-hd">
        <h3>Top Profiles</h3>
        <i class="la la-ellipsis-v"></i>
    </div>
    <div class="profiles-slider">
        @foreach($topProfiles as $profile)
            <div class="user-profy">
                <img src="{{asset('storage/profileImages/'.$profile->profile_pic)}}" alt="profile">
                <h3>{{$profile->username}}</h3>
                <span>{{$profile->from}}</span>
                <a href="{{route('profiles.show', $profile->username)}}" title="">View Profile</a>
            </div><!--user-profy end-->
        @endforeach
    </div><!--profiles-slider end-->
</div><!--top-profiles end-->
