<div class="tab-pane fade" id="privacy" role="tabpanel" aria-labelledby="nav-privacy-tab">
    <div class="privac">
        <div class="row">
            <div class="col-12">
                <h3>Privacy</h3>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="dropdown privacydropd">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Change your profile picture</a>
                    <div class="dropdown-menu">
                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                                <form
                                    action="{{route('profiles.update', ['profile'=> session()->get('user')->user_id])}}"
                                    method="POST"
                                    id="cover-change" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="custom-control">
                                        <input type="file" name="profile_pic">
                                        <button type="submit" class="btn btn-dark">Upload</button>
                                        </br>
                                        <h3>Make sure that picture has same width and height</h3>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="dropdown privacydropd">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Edit your basic information</a>
                    <div class="dropdown-menu">
                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                                <form
                                    action="{{route('profiles.update', ['profile'=>session()->get('user')->user_id])}}"
                                    method="POST">
                                    @method('put')
                                    @csrf
                                    <input type="text" name="info" hidden>
                                    <div class="cp-field">
                                        <h5>Where are you from ?</h5>
                                        <div class="cpp-fiel">
                                            <input type="text" name="from" placeholder="Country - City"
                                                   value="{{$user->from}}">
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Mobile number ? Sure, no, maybe ?</h5>
                                        <div class="cpp-fiel">
                                            <input type="text" name="mobile_number" placeholder="Write it down"
                                                   value="{{$user->mobile_number}}">
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>Employee at ?</h5>
                                        <div class="cpp-fiel">
                                            <input type="text" name="work" placeholder="Company"
                                                   value="{{$user->work}}">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="dropdown privacydropd">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Write your bio</a>
                    <div class="dropdown-menu">
                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                                <form
                                    action="{{route('profiles.update', ['profile'=>session()->get('user')->user_id])}}"
                                    method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="cp-field">
                                        <h5>Bio</h5>
                                        <div class="cpp-fiel">
                                            <textarea type="text" name="bio"
                                                      placeholder="Tell us more about you">{{$user->bio}}</textarea>
                                        </div>
                                        <input type="text" name="bioX" hidden>
                                    </div>
                                    <button type="submit" class="btn btn-dark">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
