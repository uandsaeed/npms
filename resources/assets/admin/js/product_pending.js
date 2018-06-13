$(document).ready(function () {

    let page = $('#page_product_pending');

    if(page.length > 0){

        console.log('pending page');

        $('.label-ingredient').on({
            mouseenter : function() {
                $(this).addClass("label-danger");
                $(this).removeClass("label-default");
            },
            mouseleave : function() {
                $(this).removeClass("label-danger");
                $(this).addClass("label-default");
            }
        });


        $('.btn-approve').click(function () {

            let id = $(this).attr('data-id');
            console.log('id ', id);

            let row = $('#row_'+id);


            row.addClass('warning')
                .find('a,button').attr('disabled', 'disabled');

            $.ajax({
                url: '/admin/product/approve/'+id,
                method: 'post'
            }).done(function (response) {


                console.log('response ', response);

                row.remove();

            }).fail(function (xhr) {

            }).always(function () {


                row.removeClass('warning')
                    .find('a,button').attr('disabled', false);

            });

        });

    }

});