$(document).ready(function () {

    let tableAnswers = $('#table-answers');

    if(tableAnswers.length > 0){

        console.log('Table Answer');

        addAnswer();
        function addAnswer() {

            $('.btn-add-answer').click(function () {

                let data = {
                    title: $('#answer_title').val(),
                    question_id: $('#question_id').val(),
                    sort: $('#answer_sort').val(),
                };

                let type = $(this).attr('data-type');

                let url = '/admin/answer/';

                if (type === 'update'){
                    let id = $(this).attr('data-id');

                    url = url + id;

                    $('tr#answer_'+id).addClass('warning');

                }

                $.ajax({
                    data: data,
                    method: 'post',
                    url: url
                }).done(function (response, textStatus, xhr) {

                    let sort = '<td>'+response.answer.sort+'</td>';
                    let title = '<td>'+response.answer.title+'</td>';
                    let row = '<tr class="success">'+sort+title+'<td>...</td></tr>';
                    $('#answer-body').append(row);

                    if (type === 'update'){
                        $('tr#answer_'+response.answer.id).remove();
                    }

                    clear();

                }).fail(function (error, textStatus, errorThrown) {

                });

            });
        }

        function clear() {

            $('#answer_title').val('');
            $('#answer_sort').val('');

            $('.btn-add-answer').text('Insert');
            $('.btn-add-answer').attr('data-id', '');
            $('.btn-add-answer').attr('data-type', 'insert');

        }


        tableAnswers.on('click', '.btn-edit', function () {

            let id = $(this).attr('data-id');

            $('#answer_title').val($(this).attr('data-title'));
            $('#answer_sort').val($(this).attr('data-sort'));
            $('.btn-add-answer').text('Update');
            $('.btn-add-answer').attr('data-id', id);
            $('.btn-add-answer').attr('data-type', 'update');

        });


        tableAnswers.on('click', '.btn-remove', function () {

            let id = $(this).attr('data-id');

            $('tr#answer_'+id).addClass('warning');

            $.ajax({
                url: '/admin/answer/'+id,
                method: 'delete',
            }).done(function (response, textStatus, xhr) {


                if (xhr.status === 204){
                    $('tr#answer_'+id).remove();
                }

            }).fail(function (xhr, textStatus, errorThrown) {

                console.log('sync error: ', xhr);

            })

        });

    }

});