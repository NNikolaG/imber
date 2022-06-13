<div class="post-popup pst-pj">
    <div class="post-project">
        <h3>Tell us what are u thinking of</h3>
        <div class="post-project-fields">
            <form action="{{route('home.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <textarea name="content" placeholder="what's happening ?"></textarea>
                    </div>
                    <input type="text" name="user_id" value="{{session()->get('user')->user_id}}" hidden>
                    <input type="file" name="image">
                    <div class="col-lg-12">
                        <ul>
                            <li>
                                <button class="active" type="submit" value="post">Post</button>
                            </li>
                            <li><a href="#" class="exit" title="">Cancel</a></li>
                        </ul>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </form>
        </div><!--post-project-fields end-->
        <a href="#" title=""><i class="la la-times-circle-o"></i></a>
    </div><!--post-project end-->
</div><!--post-project-popup end-->
