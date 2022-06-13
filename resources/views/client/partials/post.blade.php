<div class="post-bar" id="post_{{$post->post_id}}">
    <div class="post_topbar">
        <div class="usy-dt">
            <img class='post-img' src="{{asset('storage/profileImages/'.$post->profile_pic)}}" alt="profile">
            <div class="usy-name">
                <h3>{{$post->username}}</h3>
                <span><img src="{{asset('assets/images/clock.png')}}" alt="clock">{{time_elapsed_string($post->created)}}</span>
            </div>
        </div>
        @if(session()->get('user')->user_id == $post->user_id)
            <div class="ed-opts">
                <a href="#" title="" class="ed-opts-open">
                    <i class="la la-ellipsis-v"></i></a>
                <ul class="ed-options">
                    <form action="{{route('home.destroy', ['home'=>$post->post_id])}}" method="POST">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </ul>
            </div>
        @endif
    </div>
    <div class="epi-sec">
        <ul class="descp">
            <li><img src="{{asset('assets/images/icon9.png')}}" alt=""><span>{{$post->from}}</span></li>
        </ul>
    </div>
    <div class="job_descp">
        <p>{{$post->content}}</p>
    </div>
    @if($post->image)
        <div class="img-post">
            <img src="{{asset('storage/gallery/'.$post->image)}}">
        </div>
    @endif
    <div class="job-status-bar">
        <ul class="like-com">
            <li class="likes" data-pid="{{$post->post_id}}" data-uid="{{session()->get('user')->user_id}}">
                <a id="likeCounter"><i class="fa fa-heart" aria-hidden="true"></i>Likes {{$post->likes->count()}}</a>
            </li>
            <li data-tab="comment-dd">
                <a id="comCounter"><i class="fa fa-comment" aria-hidden="true"></i> Comments {{$post->comments->count()}}
                </a>
            </li>
        </ul>
    </div>
    <div id="comms">
        @foreach($post->comments as $com)
            <div class="comment-section" style="margin-top: 20px">
                <div class="comment-sec">
                    <ul>
                        <li>
                            <div class="comment-list">
                                <div class="bg-img">
                                    <img src="{{asset('storage/profileImages/'.$com->profile_pic)}}"
                                         alt="profile">
                                </div>
                                <div class="comment">
                                    <h3>{{$com->username}}</h3>
                                    <span><img src="{{asset('assets/images/clock.png')}}" alt=""> {{time_elapsed_string($com->time)}}</span>
                                    <p>{{$com->content}}</p>
                                </div>
                            </div><!--comment-list end-->
                        </li>
                    </ul>
                </div><!--comment-sec end-->
            </div><!--comment-section end-->
        @endforeach
    </div>
    <div class="post-comment">
        <div class="comment_box">
            <form id="form_{{$post->post_id}}">
                <meta name="csrf-token" content="{{ csrf_token() }}"/>

                <input type="text" placeholder="Post a comment" id="com">
                <input type="text" id="user_id" value="{{session()->get('user')->user_id}}" hidden>
                <input type="text" id="post_id" value="{{$post->post_id}}" hidden>

                <button type="button" data-id="{{$post->post_id}}" class="commenting">Comment</button>
            </form>
        </div>
    </div><!--post-comment end-->
</div><!--post-bar end-->


