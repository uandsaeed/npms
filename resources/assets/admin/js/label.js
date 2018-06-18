$(document).ready(function () {

    let tableLabel = $('#table-labels');

    if(tableLabel.length > 0){

        console.log('Table Label');


        tableLabel.on('click', '.btn-sync', function () {

            let id = $(this).attr('data-id');
            console.log(' sync '+id);

            $.ajax({
                url: '/admin/label/sync/'+id,
                method: 'get',
            }).done(function (response, textStatus, xhr) {

                console.log('response ', response);
            }).fail(function (xhr, textStatus, errorThrown) {

                console.log('sync error: ', xhr);

            })

        });

    }

});