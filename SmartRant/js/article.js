jQuery(document).ready(function ($)
{
    var articalModal = $('.article-form'),
            userAddArticle = $('.user-add-article');


    userAddArticle.on('click', function (event) {
        articalModal.toggleClass('is-visible');
    });

    articalModal.on('click', function (event) {
        if ($(event.target).is(articalModal) || $(event.target).is('.my-close-form')) {
            articalModal.removeClass('is-visible');
        }
    });

    $(document).keyup(function (event) {
        if (event.which == '27') {
            articalModal.removeClass('is-visible');
        }
    });

});

//*********************Rate Article*************************\\
$(document).ready(function () {
    $('.rate').click(function (e) {
        e.preventDefault();
        var ratingId = $('#ratingID').val();

        var clickBtnValue = $(this).val();

        var ajaxurl = 'ProcessRating.php',
                data = {'action': clickBtnValue, 'ratingID': ratingId};

        $.post(ajaxurl, data, function (response) {
            console.log(response);

        });
    });
});