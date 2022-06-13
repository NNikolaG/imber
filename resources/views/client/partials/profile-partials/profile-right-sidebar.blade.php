<div class="right-sidebar">
    <div class="message-btn">
        @if(session()->get('user')->username == $user->username)
            <form action="{{route('profiles.update', ['profile'=> session()->get('user')->user_id])}}" method="POST"
                  id="cover-change" enctype="multipart/form-data">
                @method('put')
                @csrf
                <a class="flww">
                    <label class="custom-file-upload">
                        <input type="file" id="update-cover" name="coverImage"/>
                        Change Cover
                    </label>
                </a>
            </form>
        @endif
    </div>
</div><!--right-sidebar end-->
