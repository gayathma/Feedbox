searchVisible = 0;
transparent = true;

$(document).ready(function () {
    $("input.cbtn").click(function () {
        $('body,html').animate({
                scrollTop: 0
            }, scroll_top_duration
        );
    });


    /*  Activate the tooltips      */
    $('[rel="tooltip"]').tooltip();

    $('.wizard-card').bootstrapWizard({
        'tabClass': 'nav nav-pills',
        'nextSelector': '.btn-next',
        'previousSelector': '.btn-previous',
        'finishSelector': '.btn-finish',

        onInit: function (tab, navigation, index) {

            //check number of tabs and fill the entire row
            var $total = navigation.find('li').length;
            $width = 100 / $total;

            $display_width = $(document).width();

            if ($display_width < 600 && $total > 3) {
                $width = 50;
            }

            navigation.find('li').css('width', $width + '%');

        },
        onNext: function (tab, navigation, index) {

            if (index == 1) {
                return validateFirstStep();
            } else {
                return validateSecondStep();
            }

        },
        onTabClick: function (tab, navigation, index) {
            // Disable the posibility to click on tabs
            return false;
        },
        onTabShow: function (tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index + 1;

            var wizard = navigation.closest('.wizard-card');


            el = $('.wizard-container');
            el.addClass('animated fadeInDown');
            el.one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
                function (e) {
                    el.removeClass('animated fadeInDown');
                });

            $('.wizard-container').addClass('animated fadeInDown');
            if ($current >= $total) {
                $(wizard).find('.btn-next').hide();
                $(wizard).find('.btn-finish').show();
            } else if ($current == 1) {
                $(wizard).find('.btn-next').show();
                $(wizard).find('.nxt-btn').hide();
                $(wizard).find('.btn-finish').hide();
            } else {
                $(wizard).find('.btn-next').show();
                $(wizard).find('.btn-finish').hide();
            }
            scroll_top_duration = 700,
            $('body,html').animate({
                    scrollTop: 0
                }, scroll_top_duration
            );
        }

    });

    $('.btn-finish').on('click', function () {
        return validateLastStep();
    });


    $('[data-toggle="wizard-radio"]').click(function () {
        wizard = $(this).closest('.wizard-card');
        wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
        $(this).addClass('active');
        $(wizard).find('[type="radio"]').removeAttr('checked');
        $(this).find('[type="radio"]').attr('checked', 'true');
    });

    $('[data-toggle="wizard-checkbox"]').click(function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $(this).find('[type="checkbox"]').removeAttr('checked');
        } else {
            $(this).addClass('active');
            $(this).find('[type="checkbox"]').attr('checked', 'true');
        }
    });

    $height = $(document).height();
    $('.set-full-height').css('height', $height);

});


function validateSecondStep() {

    //code here for question steps
    if (!$("#feed_form").valid()) {
        return false;
    }
    return true;

}

function validateLastStep() {

    //code here for last step
    if (!$("#feed_form").valid()) {
        return false;
    }

    questionnaire_id = $('#questionnaire_id').val();

    $.ajax(
        {
            url: site_url + '/feedback',
            type: "POST",
            data: $('#feed_form').serialize(),
            success: function (data, textStatus, jqXHR) {
                $('#main_content').html(data);
                setTimeout("location.href = site_url+'/'+questionnaire_id;", 5000);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //if fails
            }
        });

    return true;
}
