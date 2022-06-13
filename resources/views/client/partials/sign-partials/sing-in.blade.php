<div class="sign_in_sec current" id="tab-1">
    <h3>Sign in</h3>
    <form action="{{route('signin')}}" method="POST" id="signin">
        @csrf
        <div class="row">
            <div class="col-lg-12 no-pdd">
                <span id="emailHelp"></span>
                <div class="sn-field">
                    <input type="text" name="email" id="logEmail" placeholder="Email">
                    <i class="la la-user"></i>
                </div><!--sn-field end-->

            </div>
            <div class="col-lg-12 no-pdd">
                <span id="passHelp"></span>
                <div class="sn-field">
                    <input type="password" name="password" id='logPassword' placeholder="Password">
                    <i class="la la-lock"></i>
                </div>
            </div>
            <div class="col-lg-12 no-pdd">
                <button type="submit" value="button" id="submitSignin">Sign in</button>
            </div>
        </div>
    </form>
</div><!--sign_in_sec end-->
