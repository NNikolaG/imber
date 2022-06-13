$(document).ready(function () {

    // Comments
    let sendCom = document.querySelectorAll('.commenting');
    sendCom.forEach(e => {
        e.addEventListener('click', function (e) {
            e.preventDefault();

            var form = '#form_' + $(this).data('id');

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            let com = $(form).children('#com').val();
            let post = $(form).children('#post_id').val();
            let user = $(form).children('#user_id').val();

            if (com != '') {
                $.ajax({
                    type: "POST",
                    url: "/comment",
                    data: {
                        'user_id': user,
                        'post_id': post,
                        'content': com,
                        '_token': CSRF_TOKEN
                    },
                    headers: {
                        'Accept': 'Application/json'
                    },
                    dataType: "json",
                    success: function (data) {
                        let html = '';
                        data.forEach(e => {
                            html += `
                        <div class="comment-section" style="margin-top: 20px">
            <div class="comment-sec">
                <ul>
                    <li>
                        <div class="comment-list">
                            <div class="bg-img">
                                <img src="/storage/profileImages/${e.profile_pic}" alt="profile">
                            </div>
                            <div class="comment">
                                <h3>${e.username}</h3>
                                <span><img src="assets/images/clock.png" alt="">${e.elapsed}</span>
                                <p>${e.content}</p>
                            </div>
                        </div><!--comment-list end-->
                    </li>
                </ul>
            </div><!--comment-sec end-->
        </div><!--comment-section end-->`;
                        })
                        $('#post_' + post).children('#comms').html(html);
                        $('#post_' + post).find('#comCounter').html('<i class="fa fa-comment" aria-hidden="true"></i> Comments ' + data.length);
                        $(form).children('#com').val('');
                    },
                    error: function (xhr) {
                        console.error(xhr)
                    }
                });
            }
        })
    })

    //Likes
    let like = document.querySelectorAll('.likes');
    like.forEach(e => {
        e.addEventListener('click', function (e) {
            e.preventDefault();

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            let post = this.dataset.pid;
            let user = this.dataset.uid;

            $.ajax({
                url: '/like',
                method: 'POST',
                dataType: 'json',
                data: {
                    'post_id': post,
                    'user_id': user,
                    '_token': CSRF_TOKEN
                },
                headers: {
                    'Accept': 'application/json'
                },
                success: function (data) {
                    let element = '#post_' + post;
                    $(element).find('#likeCounter').html('<i class="fa fa-heart" aria-hidden="true"></i> Likes ' + data.length);
                },
                error: function (xhr) {
                    console.error(xhr);
                }
            })
        })
    })

    //Follow
    try {
        document.querySelector('body').addEventListener('click', e => {
            if (e.target.matches('.follow') || e.target.closest('.follow')) {

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                let userx = e.path[1].dataset.ux;
                let usert = e.path[1].dataset.ut;

                let element = e.path[1];

                if (userx != null) {
                    $.ajax({
                        url: '/follow',
                        method: 'post',
                        dataType: 'json',
                        data: {
                            'follower_id': usert,
                            'followed_id': userx,
                            '_token': CSRF_TOKEN
                        },
                        headers: {
                            'Accept': 'application/json'
                        },
                        success: function (data) {
                            let html = '';
                            if (data == 'Follow') {
                                html += `<a href="#" title="" class="flww">
                                <i class="la la-plus"></i>
                                Follow
                        </a>`;
                            }
                            if (data == 'Following') {
                                html += `<a href="#" title="" class="flww">
                                    <i class="la la-check"></i>
                                    Following
                                </a>`;
                            }
                            element.innerHTML = html;
                        },
                        error: function (xhr) {
                            console.error(xhr)
                        }
                    });
                }
            }
        })
    } catch (ex) {
    }

    //Message Insert
    let msg = document.querySelectorAll('.send');
    msg.forEach(e => {
        e.addEventListener('click', function (e) {

            let content = $(this).parent().find('#msg').val()
            let sender = $(this).parent().find('#snd').val()
            let receiver = $(this).parent().find('#rcv').val()

            let idt = this.dataset.idt;
            let idx = this.dataset.idx;

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '/message',
                method: 'post',
                dataType: 'json',
                data: {
                    'idt': sender,
                    'idx': receiver,
                    'content': content,
                    '_token': CSRF_TOKEN
                },
                headers: {
                    'Accept': 'Application/json'
                },
                success: function (data) {
                    html = '';
                    for (const msg of data) {
                        if (msg.receiver_id == idx) {
                            html +=
                                `
                            <div class="main-message-box ta-right">
                    <div class="message-dt" style="float: right">
                        <div class="message-inner-dt">
                            <p>${msg.content}</p>
                        </div><!--message-inner-dt end-->
                        <span>${msg.datetime}</span>
                    </div><!--message-dt end-->
                </div><!--main-message-box end-->
                            `;
                        } else {
                            html +=
                                `
                            <div class="main-message-box st3">
                    <div class="message-dt st3">
                        <div class="message-inner-dt">
                            <p>${msg.content}</p>
                        </div><!--message-inner-dt end-->
                        <span>${msg.datetime}</span>
                    </div><!--message-dt end-->
                </div><!--main-message-box end-->
                            `;
                        }
                    }
                    $('.myBox' + idx).html(html);
                },
                error: function (xhr) {
                    console.error(xhr);
                }
            })
            $(this).parent().find('#msg').val('');
        })
    })

    //MessageBox Dispaly
    let box = document.querySelectorAll('.msgBox');
    box.forEach(e => {
        e.addEventListener('click', function (e) {
            e.preventDefault();

            let idt = this.dataset.idt;
            let idx = this.dataset.idx;

            let data = {
                'idt': idt,
                'idx': idx
            }

            $.ajax({
                url: '/messagesFetch',
                method: 'get',
                dataType: 'json',
                data: data,
                headers: {
                    'Accept': 'Application/json'
                },
                success: function (data) {
                    html = '';
                    for (const msg of data) {
                        if (msg.receiver_id == idx) {
                            html +=
                                `
                            <div class="main-message-box ta-right">
                    <div class="message-dt" style="float: right">
                        <div class="message-inner-dt">
                            <p>${msg.content}</p>
                        </div><!--message-inner-dt end-->
                        <span>${msg.datetime}</span>
                    </div><!--message-dt end-->
                </div><!--main-message-box end-->
                            `;
                        } else {
                            html +=
                                `
                            <div class="main-message-box st3">
                    <div class="message-dt st3">
                        <div class="message-inner-dt">
                            <p>${msg.content}</p>
                        </div><!--message-inner-dt end-->
                        <span>${msg.datetime}</span>
                    </div><!--message-dt end-->
                </div><!--main-message-box end-->
                            `;
                        }
                    }
                    $('.myBox' + idx).html(html);
                },
                error: function (xhr) {
                    console.error(xhr)
                }
            })
        })
    })

    // Search
    try {
        let src = document.querySelector('#src');
        src.addEventListener('keyup', function (e) {
            e.preventDefault();
            let key = this.value;
            fetchData(1, key);
        })

        $(document).on('click', '.pagination a', function (event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var key = $('#src').val();
            fetchData(page, key);
        });

        function fetchData(page = 1, key = "") {
            $.ajax({
                url: '/pagination?page=' + page + "&key=" + key,
                method: 'get',
                success: function (data) {
                    $('#profiles').html(data);
                }
            })
        }
    } catch (ex) {
    }
    try {
        let editRole = document.querySelectorAll('.edit-role');
        editRole.forEach(e => {
            e.addEventListener('click', function (event) {
                event.preventDefault();
                let role = this.dataset.id;
                $.ajax({
                    url: '/get-role',
                    method: 'get',
                    dataType: 'json',
                    data: {
                        'role_id': role
                    },
                    headers: {
                        'Accept': 'application/json'
                    },
                    success: function (data) {
                        console.log(data);
                        html = data.role_name;
                        $('#role-editor').val(html);
                        $('#role-editor').removeAttr('disabled');
                        $('#editing-role').html('Edit Role - ' + data.role_name);
                        $('#updateME').val(data.role_id);
                    },
                    error: function (xhr) {
                        console.error(xhr)
                    }
                })
            })
        })

        let editNav = document.querySelectorAll('.edit-nav');
        editNav.forEach(e => {
            e.addEventListener('click', function (event) {
                event.preventDefault();
                let nav = this.dataset.id;
                $.ajax({
                    url: '/get-nav',
                    method: 'get',
                    dataType: 'json',
                    data: {
                        'navlink_id': nav
                    },
                    headers: {
                        'Accept': 'application/json'
                    },
                    success: function (data) {
                        $('#nav-name').val(data.name);
                        $('#nav-name').removeAttr('disabled');
                        $('#nav-route').val(data.route);
                        $('#nav-route').removeAttr('disabled');
                        $('#nav-tag').val(data.alttag);
                        $('#nav-tag').removeAttr('disabled');
                        $('#editing-nav').html('Edit Nav Link - ' + data.name);
                        $('#updateMe').val(data.navlink_id);
                    },
                    error: function (xhr) {
                        console.error(xhr)
                    }
                })
            })
        })

        $(document).on('click', '.pagination a', function (event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var date = $('#date').val();
            fetchLogs(page, date);
        });

        function fetchLogs(page = 1, date = '') {
            $.ajax({
                url: '/fetch-logs?page=' + page + '&date=' + date,
                method: 'get',
                success: function (data) {
                    $('#logs-table').html(data);
                }
            })
        }

        let filter = document.querySelector('#filter');
        filter.addEventListener('click', e => {
            e.preventDefault();
            let date = $('#date').val();
            fetchLogs(1, date);
        })
    } catch (ex) {
    }
});

