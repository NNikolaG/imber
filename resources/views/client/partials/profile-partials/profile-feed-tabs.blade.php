<div class="main-ws-sec">
    <div class="product-feed-tab current" id="feed-dd">
        <div class="posts-section">
            @if($post->isEmpty())
                <h1 style="font-size: 2rem; color: white; display: flex; justify-content: center;">No Posts</h1>
            @else
                @foreach($post as $p)
                    @component('client.partials.post',[
                        'post'=>$p
])
                    @endcomponent
                @endforeach
            @endif
            <div class="process-comm">
                <div class="spinner">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                </div>
            </div><!--process-comm end-->
        </div><!--posts-section end-->
    </div><!--product-feed-tab end-->

    <div class="product-feed-tab" id="info-dd">
        <div class="user-profile-ov st2">
            <h3>Overview</h3>
            <h4>From</h4>
            <p>{{$user->from}}</p>
            <h4>Gender</h4>
            <p>{{$user->gender}}</p>
            <h4>Mobile Number</h4>
            <p>
                @if($user->mobile_number == null)
                    No mobile number added
                @else
                    {{$user->mobile_number}}
                @endif
            </p>
            <h4>Work</h4>
            <p>
                @if($user->work == null)
                    No work added
                @else
                    {{$user->work}}
                @endif
            </p>
        </div><!--user-profile-partials-ov end-->
        <div class="user-profile-ov">
            <h3>Bio</h3>
            <p>
                @if($user->bio == null)
                    No bio added
                @else
                    {{$user->bio}}
                @endif
            </p>
        </div><!--user-profile-partials-ov end-->

    </div><!--product-feed-tab end-->
    <div class="product-feed-tab" id="portfolio-dd">
        <div class="portfolio-gallery-sec">
            <h3>Gallery</h3>
            <div class="gallery_pf portfolio-item row">
                @foreach($post as $p)
                    @if($p->image)
                    @component('client.partials.profile-partials.profile-image-in-gallery', [
                        'image' => $p->image
])
                    @endcomponent
                    @endif
                @endforeach
            </div><!--gallery_pf end-->
        </div><!--portfolio-gallery-sec end-->
    </div><!--product-feed-tab end-->
</div><!--main-ws-sec end-->
