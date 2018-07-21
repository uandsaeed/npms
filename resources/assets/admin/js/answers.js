$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });

    let tableAnswers = $('#table-answers');

    if(tableAnswers.length > 0){

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
                    let row = '<tr class="success">'+sort+title+'<td>...</td><td>...</td></tr>';
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

            });

        });

        tableAnswers.on('click', '.btn-add-label', function () {

            let id = $(this).attr('data-id');
            let answerTitle = $('#js-answer-title');

            $('tr').removeClass('warning');
            $('tr#answer_'+id).addClass('warning');
            answerTitle.html($(this).attr('data-title'));
            answerTitle.attr('data-answer-id', id);

            $('.btn-add-label-to-answer').attr('data-id', id);
            $('.btn-add-label-to-question').removeAttr('DISABLED');


        });
        

        searchLabel();
        function searchLabel() {

            $('.btn-search-label').click(function () {

                let keyword = $('#input-search-label').val();
                let table = $('.js-label-table');
                let dataAnswerId = $('#js-answer-title').attr('data-answer-id');
                let isDisabled = dataAnswerId !== '' ? '' : 'DISABLED';

                console.log('isDisabled', isDisabled);

                table.html('');

                $.ajax({
                    url: '/admin/label/search?search='+keyword+'&type=ajax',
                    method: 'get',
                }).done(function (response, textStatus, xhr) {

                    let rows = '';

                    $.each(response.labels, function (key, label) {

                        let action='<button '+isDisabled+' data-label-id="'+label.id+'" class="btn btn-add-label-to-question btn-primary btn-flat btn-sm"><i class="fa fa-plus-square"></i> Attach</button>';
                        rows += '<tr><td>'+label.title+'</td><td>'+label.keywords+'</td><td>'+label.match.label+'</td><td>'+getLabelType(label.type)+'</td><td class="text-right">'+action+'</td></tr>';

                    });

                    table.append(rows);

                }).fail(function (xhr, textStatus, errorThrown) {

                    console.log('sync error: ', xhr);

                });



            });

        }

        clearLabelSearch();
        function clearLabelSearch() {

            $('.btn-clear-label').click(function () {

                $('.js-label-table').html('');

                let answerTitle = $('#js-answer-title');
                answerTitle.attr('data-answer-id', '');
                answerTitle.html('Please select an answer');

            });

        }

    }


    function getLabelType(key) {

        switch(key) {
            case 1:
                return 'Gender';
                break;
            case 2:
                return 'Age';

                break;
            case 3:
                return 'Price';

                break;
            case 4:
                return 'Skin Tone';

                break;
            case 5:
                return 'Ingredients';
                break;
        }

    }

    let addLabel = $('.box-add-label');

    if (addLabel.length > 0){

        addLabelToAnswer();
        function addLabelToAnswer() {

            $('.js-label-table').on('click', '.btn-add-label-to-question', function () {

                let answerId = $('#js-answer-title').attr('data-answer-id');
                let labelId = $(this).attr('data-label-id');

                $.ajax({
                    url: '/admin/label/answer/pivot',
                    method: 'post',
                    data: {
                        answerId: answerId,
                        labelId: labelId
                    }
                }).done(function (response, textStatus, xhr) {

                    let title =`<span class="tag label label-success">${response.label.title}</span>`;
                    $('#answer_'+answerId).find("td:eq(2)").append(title);

                }).fail(function (xhr, textStatus, errorThrown) {

                    console.log('sync error: ', xhr);

                });

            });
        }


        loadLabels();
        function loadLabels() {

            $.ajax({
                url: '/admin/label/list',
                method: 'get',
            }).done(function (response, textStatus, xhr) {

                let options = '';
                $.each(response.labels, function (key, label) {
                    options += '<option value="'+label.id+'" >'+label.title+' ('+label.match.label + ' ' +label.weight+')</option>';
                });

                $('#js-label-list').append(options);

            }).fail(function (xhr, textStatus, errorThrown) {

                console.log('sync error: ', xhr);

            });

        }

        removeLabelFromAnswer();
        function removeLabelFromAnswer() {

            $('.js-remove-label-from-answer').click(function () {

                let labelId = $(this).attr('data-label-id');
                let answerId = $(this).attr('data-answer-id');
                let label = $('#label_'+answerId+'_'+labelId);


                $.ajax({
                    url: '/admin/answer/'+answerId+'/'+labelId,
                    method: 'delete',
                }).done(function (response, textStatus, xhr) {

                    if (xhr.status === 204){
                        console.log('remove '+answerId);

                        label.remove();

                    }

                }).fail(function (xhr, textStatus, errorThrown) {

                    console.log('sync error: ', xhr);

                });

            });
        }

    }

});