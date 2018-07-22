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

    }// product permission


    let globalPermission = $('#page_global_permission');

    if (globalPermission.length > 0){

        /**
         *
         */
        $('.btn-insert-permission').click(function () {

            let permissionId = $(this).attr('data-id');
            permission.find('#permission_'+permissionId).addClass('warning');

            let data = {
                field: $('#field').val(),
                permission: $("input[name='permission']:checked").val()
            };
            
            $.ajax({
                url : '/admin/product/global/permissions/',
                method: 'post',
                data: data,
            }).done(function (response, textStatus, xhr) {


                let permissionClass = data.permission === "0" ? 'label-default' : 'label-success';
                let permission = `<label class='label ${permissionClass}'>${ data.permission === "0" ? 'No' : 'Yes' }</label>`;

                let createdBy = `<td><small class="text-muted">${$('.js-created-by').text()}</small></td>`;
                let updatedBy = `<td><small class="text-muted">${$('.js-updated-by').text()}</small></td>`;

                let row = `<tr><td>${data.field}</td><td>${permission}</td>${createdBy + updatedBy}</tr>`;

                $('#table-global-permissions').append(row);

            }).fail(function (error, textStatus, errorThrown) {

            }).always(function () {
                permission.find('#permission_'+permissionId).removeClass('warning');
            });

        });

        /**
         * Change Permission
         */
        $('.btn-change-global-permission').click(function () {

            let permissionId = $(this).attr('data-id');
            permission.find('#permission_'+permissionId).addClass('warning');

            $.ajax({
                url : '/admin/product/global/permissions/'+permissionId+'/change',
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

    let product_labels = $('#product_labels');

    if (product_labels.length > 0){

        // show/hide suggestions

        $('.btn-show-keywords-suggestions').click(function () {

            $('.js-keyword-hide').removeClass('hidden');
            $('.js-keyword-show').addClass('hidden');
            $('.js-keyword-suggestion-box').removeClass('hidden');

        });

        $('.btn-hide-keywords-suggestions').click(function () {

            $('.js-keyword-show').removeClass('hidden');
            $('.js-keyword-hide').addClass('hidden');
            $('.js-keyword-suggestion-box').addClass('hidden');

        });

        $('.js-keyword-suggestion-box .js-add-keyword-tag').click(function () {

            let label = $(this).attr('data-label');

            let keywords  = $('#keywords').text().trim();

            if(keywords.length === 0){

                keywords+=label;

            } else{
                keywords+=', '+label;
            }

            $('#keywords').text(keywords);

        });



        // let globalPermission = $('#page_global_permission');

        loadProductLabels();
        function loadProductLabels() {

            // console.log('load product labels');
            $('#js-select-product-labels').html('<option>Loading...</option>');

            $.ajax({
                url : '/admin/label/list',
                method: 'get'
            }).done(function (response, textStatus, xhr) {

                let options = '';
                $.each(response.labels, function (key, item) {
                    options+='<option value="'+item.id+'">'+item.title+ ' [ '+item.match.label+' ]' +'</option>';
                });


                $('#js-select-product-labels').html(options);


            }).fail(function (error, textStatus, errorThrown) {

            }).always(function () {
                // permission.find('#permission_'+permissionId).removeClass('warning');
            });

        }

        /**
         * Add label to product
         */
        $('.btn-add-product-label').click(function () {

            let productId = $(this).attr('data-product-id');
            let labelId = $('#js-select-product-labels option:selected').val();

            $.ajax({
                url : '/admin/product/'+productId+'/sync-label',
                method: 'post',
                data: {
                    labelId: labelId
                }
            }).done(function (response, textStatus, xhr) {

                let row = '';

                $.each(response.labels, function (key, item) {

                    row+= '<tr><td>'+item.title+'</td><td>'+item.match.label+'</td><td>'+item.weight+'</td><td>...</td><tr/>'
                });

                product_labels.find('table > tbody').append(row);

            }).fail(function (error, textStatus, errorThrown) {

            });

        });

        /**
         * Remove product
         */
        $('.btn-remove-product-label').click(function () {

            let result = confirm('Are you sure to remove?');

            if (result=== true){
                let productId = $('#product-id').val();
                let labelId = $(this).attr('data-label-id');

                $('#row_label_'+labelId).addClass('warning');

                $.ajax({
                    url : '/admin/product/'+productId+'/remove-label',
                    method: 'post',
                    data: {
                        labelId: labelId
                    }
                }).done(function (response, textStatus, xhr) {

                    $('#row_label_'+labelId).remove();

                }).fail(function (error, textStatus, errorThrown) {

                });
            }

        });

    }

});