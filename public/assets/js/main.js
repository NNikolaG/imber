//NEWS API
$(document).ready(function () {
    try {
        var url = 'https://newsapi.org/v2/top-headlines?' +
            'country=us&' +
            'sortBy=popularity&' +
            'apiKey=f369a0b2c00e4702939fdd2644ce1af0';
        var req = new Request(url);
        fetch(req)
            .then((response) => {
                return response.json()
            }).then((data) => {
            let html = '';
            let br = 0;
            for (const e of data.articles) {
                br++;
                html += `<div class="job-info">
                    <div class="job-details">
                    <a href="${e.url}" target="_blank" class="portal">
                    <h3>${e.title}</h3>
                        ${getImage(e.urlToImage)}
                    </a>
                    <div>
                        <span class="author">${getAuthor(e.author)}</span>
                    </div>
                </div>
            </div><!--job-info end-->
            <hr>`;
                if (br >= 10) {
                    break;
                }
            }
            try {
                document.querySelector('#news').innerHTML = html;
            } catch (e) {
            }

            function getImage(img) {
                if (img === null) {
                    return '';
                }
                return '<img src="' + img + '">';
            }

            function getAuthor(auth) {
                if (auth === null) {
                    return '';
                }
                return auth;
            }

        })
    } catch (e) {
    }

    try {
        document.getElementById("update-cover").onchange = function () {
            document.getElementById("cover-change").submit();
        };


        $(document).ready(function () {
            var popup_btn = $('.popup-btn');
            popup_btn.magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    } catch (ex) {
    }

    // VALIDACIJE
    // RegEx funkcija
    function regEx(regEx, element, errMsg, help) {
        if (!regEx.test(element.value)) {
            document.querySelector(help).innerHTML = errMsg;
            $(help).removeClass('correct').addClass('false');
            return false;
        } else {
            document.querySelector(help).innerHTML = "Correct Input";
            $(help).removeClass('false').addClass('correct');
            return true;
        }
    }

    //Password potvrda
    function confirm(value, value2, errMsg, help) {
        if (value != value2) {
            document.querySelector(help).innerHTML = errMsg;
            $(help).removeClass('correct').addClass('false');
            return false;
        } else if (value2.length < 8) {
            document.querySelector(help).innerHTML = 'Incorect Input';
            $(help).removeClass('correct').addClass('false');
            return false;
        } else {
            document.querySelector(help).innerHTML = 'Password Confirmed';
            $(help).removeClass('false').addClass('correct');
            return true;
        }
    }

    //Log in & Sign up --email-- validacija
    var emailLogin = document.querySelector('#logEmail');
    var regExEmail = /^([a-z0-9_ .-]+)@([\d a-z.-]+).([a-z.]{2,6})$/
    var errMsgEmail = "Email example : example@example.ex";

    //Log in --password-- validacija
    var passwordLogin = document.querySelector('#logPassword');
    var regExPass = /^(?=.*[\d])(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*])[\w!@#$%^&*]{8,}$/;
    var errMsgPass = 'At least 8 characters long\n' +
        'Include at least 1 lowercase letter\n' +
        '1 capital letter\n' +
        '1 number\n' +
        '1 special character => !@#$%^&*';

    //Sign up  validacija
    var passwordRegister = document.querySelector('#passRegister');
    var emailRegister = document.querySelector('#emailRegister');

    //// Sign up --password-- potvrda
    var passwordComf = document.querySelector('#passRConf');
    var errMsgPassComf = 'Please confirm your password';

    //// Register Username
    var username = document.querySelector('#username');
    var regExFirstLastName = /^([A-ZŠĐČĆŽ][a-zšđčćž]{2,14}\s?)+$/;
    var errMsgFirstLastName = "First and Last Name must start with capital letter and contain min 3 an max 15 letters"

    try {
        let submitSignin = document.querySelector('#submitSignin');
        submitSignin.addEventListener('click', function (e) {
            e.preventDefault()

            let resultArr = [regEx(regExEmail, emailLogin, errMsgEmail, '#emailHelp'),
                regEx(regExPass, passwordLogin, errMsgPass, '#passHelp')];

            if (!resultArr.includes(false)) {
                let singin = document.querySelector('#signin');
                singin.submit();
            }
        })

        let submitRegister = document.querySelector('#submitRegister');
        submitRegister.addEventListener('click', function (e) {
            e.preventDefault()

            let resultArr = [
                regEx(regExEmail, emailRegister, errMsgEmail, '#emailRHelp'),
                regEx(regExPass, passwordRegister, errMsgPass, '#passRHelp'),
                confirm(passwordRegister.value, passwordComf.value, errMsgPassComf, '#passCHelp'),
                regEx(regExFirstLastName, username, errMsgFirstLastName, '#usernameHelp')
            ];

            if (!resultArr.includes(false)) {
                let signup = document.querySelector('#register');
                signup.submit();
            }
        })

        let cont = document.querySelector('#emailContact')
        let msg = document.querySelector('#msg');
        console.log(msg.value)
        let contact = document.querySelector('#submitContct');
        contact.addEventListener('click', function (e) {
            e.preventDefault()
            console.log(msg)
            let resultArr = [
                regEx(regExEmail, cont, errMsgEmail, '#emailCHelp')
            ];
            if(msg.length <= 3){
                resultArr.push(false);
            }
            if (!resultArr.includes(false)) {
                let contact = document.querySelector('#contact');
                contact.submit();
            }
        })
    } catch (ex) {
    }

    try {
        let old = document.querySelector('#oldPass');
        let newPass = document.querySelector('#newPass');
        let conf = document.querySelector('#passConf');

        let resetPass = document.querySelector('#resetPass');
        resetPass.addEventListener('click', function (e) {
            e.preventDefault()

            let resultArr = [
                regEx(regExPass, old, errMsgPass, '#oldHelp'),
                regEx(regExPass, newPass, errMsgPass, '#passHelp'),
                confirm(newPass.value, conf.value, errMsgPassComf, '#passConfHelp'),
            ];

            if (!resultArr.includes(false)) {
                let reset = document.querySelector('#reset');
                reset.submit();
            }
        })
    } catch (ex) {
    }
})

