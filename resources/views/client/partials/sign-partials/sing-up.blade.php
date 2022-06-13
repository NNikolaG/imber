<div class="sign_in_sec" id="tab-2">
    <div class="dff-tab current" id="tab-3">
        <form action="{{route('signup')}}" method="POST" id="register">
            @csrf
            <div class="row">
                <div class="col-lg-12 no-pdd">
                    <span id="usernameHelp"></span>
                    <div class="sn-field">
                        <input type="text" name="username" id="username" placeholder="Username">
                        <i class="la la-user"></i>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <span id="emailRHelp"></span>
                    <div class="sn-field">
                        <input type="text" name="email" id='emailRegister' placeholder="Email - min: 10 charactes">
                        <i class="la la-globe"></i>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <span id="genderHelp"></span>
                    <div class="sn-field">
                        <select id="gender" name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        <i class="la la-dropbox"></i>
                        <span><i class="fa fa-ellipsis-h"></i></span>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <span id="passRHelp"></span>
                    <div class="sn-field">
                        <input type="password" name="password" id="passRegister" placeholder="Password">
                        <i class="la la-lock"></i>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <span id="passCHelp"></span>
                    <div class="sn-field">
                        <input type="password" name="confPassword" id="passRConf" placeholder="Repeat Password">
                        <i class="la la-lock"></i>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <button type="submit" value="submit" id="submitRegister">Sign up</button>
                </div>
            </div>
        </form>
    </div><!--dff-tab end-->
</div>

