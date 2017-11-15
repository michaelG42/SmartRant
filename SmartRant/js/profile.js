jQuery(document).ready(function ($)
{
    var profileModal = $('.user-page'),
            viewProfile = profileModal.find('#user-view-profile'),
            searchForm = $('#searchForm');
    search = $('.my-search');
    userNav = $('.user-view-profile');

    userNav.on('click', function (event) {
        profileModal.toggleClass('is-visible');
    });

    search.on('click', function (event) {
        searchForm.toggleClass('search_form_container_show');
    });

    profileModal.on('click', function (event) {
        if ($(event.target).is(profileModal) || $(event.target).is('.my-close-form')) {
            profileModal.removeClass('is-visible');
        }
    });

    $(document).keyup(function (event) {
        if (event.which == '27') {
            profileModal.removeClass('is-visible');
        }
    });

});


$(document).ready(function () {

    $("#editUserName").click(function () {

        $("#changeNameForm").toggleClass("changeProfileUserNameVisible");
    });

    $("#editEmail").click(function () {

        $("#changeEmailForm").toggleClass("changeProfileEmailVisible");
    });

    $("#editPassword").click(function () {
        $("#passwordParagraph").toggleClass("hide");
        $("#changePasswordForm").toggleClass("changeProfilePassVisible");
    });

    $("#editImage").click(function () {

        $("#changeImageForm").toggleClass("show");
    });

    $("#userNameChangeBtn").click(function () {


        $("#changeNameForm").toggleClass("changeProfileUserNameVisible");
    });

    $("#emailChangeBtn").click(function () {


        $("#changeEmailForm").toggleClass("changeProfileEmailVisible");
    });

    $("#passwordChangeBtn").click(function () {
        $("#passwordParagraph").toggleClass("hide");
        $("#changePasswordForm").toggleClass("changeProfilePassVisible");
    });

    $("#imageChangeBtn").click(function () {
        $("#editImage").toggleClass("hide");
        $("#profileImageParagraph").toggleClass("profileButtonHide");
        $("#changeImageForm").toggleClass("show");
    });

    $(".my-search").click(function () {
        $("#search_form_container_hide").toggleClass("search_form_container_show");

    });


});

$(document).ready(function ()
{
    $('.delete').click(function () {
        $('.confirm').toggleClass('confirmShow');

        var clickBtnValue = $(this).val();
        var ajaxurl = 'ajaxDelete.php',
                data = {'action': clickBtnValue};
        if (clickBtnValue == "Delete Account") {
            $(this).val("Yes");
            
        } else if (clickBtnValue == "No") {
            $('#delete').val("Delete Account");
        }

        $.post(ajaxurl, data, function (response) {

            if (clickBtnValue == "Yes") {
                window.location.href = 'Functions/LogOut.php';
            }

        });
    });
});



