import {loader, loaderHide, url, printErrorMsg, MyscrollTop} from './loader';
import {Fancybox} from "@fancyapps/ui";


export function call_me() {
    /* call_me__js Звонок  (mini форма на главной)*/
    $('body').on('click', '.call_me__js', function (event) {

        var Parents = $(this).parents('.F_form');
        var Name = Parents.find('input[name="name"]').val();
        var Phone = Parents.find('input[name="phone"]').val();
        loader(Parents);

        $.ajax({
            url: "/send-mail/order-call",
            method: "POST",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "name": Name,
                "phone": Phone,
                "url": url(),
            },
            success: function (response) {
                if (response.error) {
                    setTimeout(function () {
                        Parents.find('.wrapper_loader ').css('display', 'none');
                        printErrorMsg(Parents, response.error);
                    }, 1000);

                } else {
                    setTimeout(function () {
                        Parents.find('.wrapper_loader ').css('display', 'none');
                        Parents.find('.F_form__body').hide();
                        Parents.find('.F_responce').show();
                    }, 1000);
                }
            }
        });

    });
    /* call_me__js Звонок (mini форма на главной)*/

}

