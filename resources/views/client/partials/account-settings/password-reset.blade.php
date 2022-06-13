<div class="tab-pane fade show active" id="nav-password" role="tabpanel"
     aria-labelledby="nav-password-tab">
    <div class="acc-setting">
        <h3>Account Setting</h3>
        <form action="{{route('changePassword')}}" method="POST" id="reset">
            @csrf
            <div class="cp-field">
                <h5>Old Password</h5>
                <span id="oldHelp"></span>
                <div class="cpp-fiel">
                    <input type="password" name="old-password" id="oldPass" placeholder="Old Password">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            <div class="cp-field">
                <h5>New Password</h5>
                <span id="passHelp"></span>
                <div class="cpp-fiel">
                    <input type="password" name="new-password" id='newPass' placeholder="New Password">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            <div class="cp-field">
                <h5>Repeat Password</h5>
                <span id="passConfHelp"></span>
                <div class="cpp-fiel">
                    <input type="password" name="repeat-password" id="passConf" placeholder="Repeat Password">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            <input type="text" value="{{session()->get('user')->user_id}}" name="id" hidden>
            <div class="save-stngs pd2">
                <ul>
                    <li>
                        <button type="submit" id="resetPass">Change</button>
                    </li>
                </ul>
            </div><!--save-stngs end-->
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div><!--acc-setting end-->
</div>
