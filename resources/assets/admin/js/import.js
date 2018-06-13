$(document).ready(function () {

    let importPage = $('#page_product_import');

    // $(function () {
    // });

    // $('[data-toggle="popover"]').popover();
    // $('body').on('ready','[data-toggle="popover"]').popover();

    let popOverSettings = {
        placement: 'right',
        container: 'body',
        trigger: 'hover',
        delay: { "show": 300, "hide": 100 },
        html: true,
        selector: '[rel="popover"]', //Sepcify the selector here
        content: function () {
            return $('#popover-content').html();
        }
    };

    $('body').popover(popOverSettings);

    if(importPage.length > 0){

        console.log('import page');


        $('#import-product-wrapper').fineUploader({
            template: 'qq_product_upload_manual_template',
            multiple: false,
            request: {
                endpoint: '/admin/product/upload',
                customHeaders: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
            validation: {
                itemLimit: 1,
                // allowedExtensions:  ['zip'],
            },
            callbacks: {
                onSubmit: function (id, name) {

                },
                onComplete: function (id, name, response, xhr ) {

                    let table = $('#import-products-list');
                    $.each(response.products, function(index, product){

                        let row = `<tr><td>${index+1}</td><td>${product.title}</td><td>${product.ingredients.substr(0, product.ingredients.lastIndexOf(' ', 97))}
<button class="btn btn-link btn-sm" data-content="${product.ingredients}" rel="popover">Show all</button></td>
<td>${product.price}</td><td>${product.currency}</td><td>${product.brand}</td><td>${product.size}</td><td>${product.unit}</td>
<td>${product.type}</td><td>${product.url}</td><td>${product.status}</td></tr>`;

                        table.append(row);

                    });

                },
                onStatusChange: function (id, oldStatus, newStatus) {

                },
                onCancel: function (id, name) {

                }
            },
            autoUpload: false
        });

        $('#btn-upload-product').click(function() {
            $('#import-product-wrapper').fineUploader('uploadStoredFiles');
        });



    }

});