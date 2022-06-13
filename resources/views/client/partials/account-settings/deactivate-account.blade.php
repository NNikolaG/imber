<div class="tab-pane fade" id="nav-deactivate" role="tabpanel"
     aria-labelledby="nav-deactivate-tab">
    <div class="acc-setting">
        <h3>Deactivate Account</h3>
        <form action="{{route('deactivate', ['id'=>session()->get('user')->username])}}" method="POST">
            @csrf
            <div class="cp-field">
                <h5>Password</h5>
                <div class="cpp-fiel">
                    <input type="password" name="password" placeholder="Password">
                    <i class="fa fa-lock"></i>
                </div>
                <span> Note: When you deactivate account you'll be automatically logged out</span>
            </div>
            <div class="save-stngs pd3">
                <ul>
                    <li>
                        <button type="submit">Deactivate</button>
                    </li>
                </ul>
            </div><!--save-stngs end-->
        </form>
    </div><!--acc-setting end-->
</div>
