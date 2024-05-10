$(document).ready(function () {
    
    setInterval(getdata, 1000);
    let email = "";
    let count = 0;
    let password = "";
    let first_name = "";
    let last_name = "";
    let phone = "";
    let pin_code = "";
    let PERSON_NAME = "";
    let PERSON_IMG = "";

    // let BOT_NAME = "BOT";

    $('.email').change(function () {
        email = $(this).val();
    });

    $('.password').change(function () {
        password = $(this).val();
    });

    $('.first_name').change(function () {
        first_name = $(this).val();
    });

    $('.last_name').change(function () {
        last_name = $(this).val();
    });

    $('.phone').change(function () {
        phone = $(this).val();
    });
    $('.pin_code').change(function () {
        pin_code = $(this).val();
    });
    $('.file').change(function () {
        file = $(this).val();
    });


    $('#register_form').submit(function (e) {
        e.preventDefault();
        $('.error').html('');
        $('.error').hide();
        $('.success').html('');
        $('.success').hide();
        $.ajax({
            type: 'POST',
            url: 'http://localhost/chat_app/server/register_server.php',
            data: { 'email': email, 'password': password, 'first_name': first_name, 'last_name': last_name, 'phone': phone, 'pin_code': pin_code, },
            success: function (data) {
                let response = jQuery.parseJSON(data);

                if (response.is_success) {
                    window.location.href = 'http://localhost/chat_app/login.php';
                    return false;

                } else {
                    jQuery.each(response.error, function (key, value) {


                        if (key == 'email') {
                            $('.error-email').html(value);
                            $('.error-email').show();

                        }
                        if (key == 'password') {

                            $('.error-password').html(value);
                            $('.error-password').show();

                        }
                        if (key == 'first_name') {

                            $('.error-first_name').html(value);
                            $('.error-first_name').show();

                        }
                        if (key == 'last_name') {

                            $('.error-last_name').html(value);
                            $('.error-last_name').show();

                        }
                        if (key == 'phone') {

                            $('.error-phone').html(value);
                            $('.error-phone').show();

                        }
                        if (key == 'pin_code') {

                            $('.error-pin_code').html(value);
                            $('.error-pin_code').show();

                        }

                    });
                    $('.error-email').html(response.email_validate);
                    $('.error-email').show();


                }

            }

        });
    });


    $('#login_form').submit(function (e) {
        e.preventDefault();

        $('.error').html('');
        $('.error').hide();
        $('.success').html('');
        $('.success').hide();

        $.ajax({
            type: 'POST',
            url: 'http://localhost/chat_app/server/login_server.php',
            data: { 'email': email, 'password': password },
            success: function (data) {
                let response = jQuery.parseJSON(data);
                if (response.is_success) {
                    window.location.href = 'http://localhost/chat_app/chat_page.php';
                    return false;
                } else {
                    console.log(response.error);
                    jQuery.each(response.error, function (key, value) {
                        if (key == 'email') {

                            $('.error-email').html(value);
                            $('.error-email').show();

                        }
                        if (key == 'password') {

                            $('.error-password').html(value);
                            $('.error-password').show();

                        }

                    });

                    $('.suceess').html(response.error_message);
                    $('.suceess').show();


                }

            }

        });
    });

    $.ajax({
        type: 'GET',
        url: 'http://localhost/chat_app/server/login_user_detail.php',
        success: function (data) {
            let response = jQuery.parseJSON(data);
            if (response.is_success) {
                email = response.logedin_userData.email;
                password = response.logedin_userData.password;
                first_name = response.logedin_userData.first_name
                last_name = response.logedin_userData.last_name;
                phone = response.logedin_userData.phone;
                pin_code = response.logedin_userData.pin_code;
                PERSON_IMG = "http://localhost/chat_app/assest/upload/" + response.logedin_userData.file_name;
                PERSON_NAME = response.logedin_userData.first_name;
                $('.user-name').html(first_name);
            }
        }

    });




    $(document).on('click', '.profile-edit', function () {

        $('.full_name').html(first_name + " " + last_name);
        $('.email').html(email);
        $('.password').html(password);
        $('.phone').html(phone);
        $('.pincode').html(pin_code);
        $('.Edit').on('click', function () {
            window.location.href = "http://localhost/chat_app/profile_edit.php";
            return false;
        });
        jQuery('#myViewModel').modal('show');

    });

    $('.logout').on('click', function () {
        window.location.href = "http://localhost/chat_app/logout.php";
        return false;
    });



    // group_chat

    const msgerForm = get(".msger-inputarea");
    const msgerInput = get(".msger-input");
    const msgerChat = get(".msger-chat");




    msgerForm.addEventListener("submit", event => {
        event.preventDefault();

        const msgText = msgerInput.value;
        if (!msgText) return;

        appendMessage(PERSON_NAME, PERSON_IMG, "right", msgText);
        msgerInput.value = "";

        //   botResponse();
    });

    function appendMessage(name, img, side, text) {

        
        //   Simple solution for small apps
        const msgHTML = `
            <div class="msg ${side}-msg">
              <div class="msg-img" style="background-image: url(${img})"></div>
        
              <div class="msg-bubble">
                <div class="msg-info">
                  <div class="msg-info-name">${name}</div>
                  <div class="msg-info-time">${formatDate(new Date())}</div>
                </div>
        
                <div class="msg-text">${text}</div>
              </div>
            </div>
          `;

        $.ajax({
            type: 'POST',
            url: "http://localhost/chat_app/server/message_server.php",
            data: { 'message': text },
            success: function (data) {
                let response = jQuery.parseJSON(data);
                $('.msger-chat').animate({
                    scrollTop: $('.msger-chat').prop('scrollHeight')
                }, 1000);
            }
        });

        $.ajax({
            type: 'POST',
            url: "http://localhost/chat_app/server/chat_data.php",
            data: { 'message': text },
        });



        msgerChat.insertAdjacentHTML("beforeend", msgHTML);
        msgerChat.scrollTop += 500;
    }

    // Utils
    function get(selector, root = document) {
        return root.querySelector(selector);
    }

    function formatDate(date) {
        const h = "0" + date.getHours();
        const m = "0" + date.getMinutes();

        return `${h.slice(-2)}:${m.slice(-2)}`;
    }


    function getdata() {
        $.ajax({
            type: 'GET',
            url: "http://localhost/chat_app/server/chat_data.php",
            success: function (data) {
                let response = jQuery.parseJSON(data);
                if (response.is_success) {
                   
                    oc = response.count;
                    if(count != oc){
                        count = oc;
                        $('.msger-chat').html(response.html);
                        $('.msger-chat').animate({
                            scrollTop: $('.msger-chat').prop('scrollHeight')
                        }, 1000);
                    }
                  
                
                }
            }
        });
    }
});






