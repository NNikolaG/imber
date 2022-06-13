<div class="sign_in_sec" id="tab-4">
    <div class="dff-tab current" id="tab-5">
        <form action="{{route('contact')}}" method="POST" id="contact">
            @csrf
            <div class="row">
                <div class="col-lg-12 no-pdd">
                    <span id="emailCHelp"></span>
                    <div class="sn-field">
                        <input type="email" name="email" id='emailContact' placeholder="Email">
                        <i class="la la-globe"></i>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <span id="msgHelp"></span>
                    <div class="sn-field">
                        <textarea class="form-control" id="msg" name="message" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <button type="submit" value="submit" id="submitContct">Send</button>
                </div>
            </div>
        </form>
    </div><!--dff-tab end-->
</div>

