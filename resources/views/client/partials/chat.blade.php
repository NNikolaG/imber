<div class="tab-pane fade" id="nav-{{str_replace(' ', '', strtolower($chat->username))}}"
     role="tabpanel"
     aria-labelledby="nav-{{strtolower($chat->username)}}-tab">
    <div class="acc-setting">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <div class="main-conversation-box">
            <div class="message-bar-head">
                <div class="usr-msg-details">
                    <div class="usr-ms-img">
                        <img src="{{asset('storage/profileImages/'.$chat->profile_pic)}}" alt="profile">
                    </div>
                    <div class="usr-mg-info">
                        <h3>{{$chat->username}}</h3>
                        <p>Online</p>
                    </div><!--usr-mg-info end-->
                </div>
            </div><!--message-bar-head end-->
            <div class="messages-line mCustomScrollbar _mCS_1">
                <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" style="max-height: none;"
                     tabindex="0">
                    <div id="mCSB_1_container" class="mCSB_container myBox{{$chat->user_id}}"
                         style="position:relative; top:0; left:0;"
                         dir="ltr">

                    </div>
                    <div id="mCSB_1_scrollbar_vertical"
                         class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical"
                         style="display: block;">
                        <div class="mCSB_draggerContainer">
                            <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                                 style="position: absolute; min-height: 30px; display: block; height: 309px; max-height: 494px; top: 0px;">
                                <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
                            </div>
                            <div class="mCSB_draggerRail"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="message-send-area">
                <form>
                    <div class="mf-field">
                        <input type="text" name="message" id="msg" placeholder="Type a message here">
                        <input type="text" name="sender" id="snd" value="{{session()->get('user')->user_id}}" hidden>
                        <input type="text" name="reciever" id="rcv" value="{{$chat->user_id}}" hidden>

                        <button type="button" class="send" data-idt="{{session()->get('user')->user_id}}"
                                data-idx="{{$chat->user_id}}">Send
                        </button>
                    </div>
                </form>
            </div><!--message-send-area end-->
        </div><!--main-conversation-box end-->
    </div><!--acc-setting end-->
</div>
