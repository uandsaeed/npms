$(document).ready(function () {

    let page = $('#page_product_pending');

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

    if(page.length > 0){

        console.log('pending page');

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
                // console.log('response ', response);
                row.remove();
            }).fail(function (xhr) {

            }).always(function () {

                row.removeClass('warning')
                    .find('a,button').attr('disabled', false);

            });

        });

    }

    let permission = $('#product_permission');

    if (permission.length > 0){

        $('.btn-change-product-permission').click(function () {

            let permissionId = $(this).attr('data-id');
            let productId = $('#product-id').val();

            permission.find('#permission_'+permissionId).addClass('warning');

            $.ajax({
                url : '/admin/product/'+productId+'/permissions/'+permissionId+'/change',
                method: 'post'
            }).done(function (response, textStatus, xhr) {

                let label = $('#label_permission_'+permissionId);

                if (response.permission === true){
                    console.log('set success');
                    label.removeClass('label-default');
                    label.addClass('label-success');
                    label.text('Yes');
                } else {
                    console.log('set default');
                    label.text('No');
                    label.addClass('label-default');
                    label.removeClass('label-success');
                }

            }).fail(function (error, textStatus, errorThrown) {

            }).always(function () {
                permission.find('#permission_'+permissionId).removeClass('warning');
            });

        });

    }

});