jQuery(document).ready(function ($)
{
    var userForm = $('.user-login'),
            formLogin = userForm.find('#my-login'),
            formSignup = userForm.find('#my-signup'),
            formForgotPassword = userForm.find('#my-reset-password'),
            userFormTab = $('.my-switcher'),
            tabLogin = userFormTab.children('li').eq(0).children('a'),
            tabSignup = userFormTab.children('li').eq(1).children('a'),
            forgotPasswordLink = formLogin.find('.user-form-bottom-message a'),
            backToLoginLink = formForgotPassword.find('.user-form-bottom-message a'),
            mainNav = $('.main-nav');


    mainNav.on('click', function (event) {
        $(event.target).is(mainNav) && mainNav.children('ul').toggleClass('is-visible');
    });


    mainNav.on('click', '.my-signup', signup_selected);

    mainNav.on('click', '.my-signin', login_selected);


    userForm.on('click', function (event) {
        if ($(event.target).is(userForm) || $(event.target).is('.my-close-form')) {
            userForm.removeClass('is-visible');
        }
    });

    $(document).keyup(function (event) {
        if (event.which == '27') {
            userForm.removeClass('is-visible');
        }
    });


    userFormTab.on('click', function (event) {
        event.preventDefault();
        ($(event.target).is(tabLogin)) ? login_selected() : signup_selected();
    });


    $('.hide-password').on('click', function () {
        var togglePass = $(this),
                passwordField = togglePass.prev('input');

        ('password' === passwordField.attr('type')) ? passwordField.attr('type', 'text') : passwordField.attr('type', 'password');
        ('Hide' === togglePass.text()) ? togglePass.text('Show') : togglePass.text('Hide');

        passwordField.putCursorAtEnd();
    });


    forgotPasswordLink.on('click', function (event) {
        event.preventDefault();
        forgot_password_selected();
    });


    backToLoginLink.on('click', function (event) {
        event.preventDefault();
        login_selected();
    });

    function login_selected() {
        mainNav.children('ul').removeClass('is-visible');
        userForm.addClass('is-visible');
        formLogin.addClass('is-selected');
        formSignup.removeClass('is-selected');
        formForgotPassword.removeClass('is-selected');
        tabLogin.addClass('selected');
        tabSignup.removeClass('selected');
    }

    function signup_selected() {
        mainNav.children('ul').removeClass('is-visible');
        userForm.addClass('is-visible');
        formLogin.removeClass('is-selected');
        formSignup.addClass('is-selected');
        formForgotPassword.removeClass('is-selected');
        tabLogin.removeClass('selected');
        tabSignup.addClass('selected');
    }

    function forgot_password_selected() {
        formLogin.removeClass('is-selected');
        formSignup.removeClass('is-selected');
        formForgotPassword.addClass('is-selected');
    }

});

