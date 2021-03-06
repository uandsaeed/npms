{{--Footer--}}

<!-- Bootstrap core JavaScript -->
<script src="{{ url(VENDOR_PATH."/jquery/jquery.min.js") }}"></script>
<script src="{{ url(VENDOR_PATH."/bootstrap/js/bootstrap.bundle.min.js") }}"></script>

<!-- Plugin JavaScript -->
<script src="{{ url(VENDOR_PATH."/font-awesome/js/all.js") }}"></script>
<script src="{{ url(VENDOR_PATH."/jquery-easing/jquery.easing.min.js") }}"></script>

<!-- Custom scripts for this site -->
<script src="{{ url(JAVASCRIPT_PATH."skinlyst.min.js") }}"></script>




{{--<script--}}
        {{--src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="--}}
        {{--crossorigin="anonymous"></script>--}}

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"--}}
        {{--integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"--}}
        {{--integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>--}}
{{--<script type="text/javascript">--}}
    {{--$(function () {--}}
        {{--$.ajaxSetup({--}}
            {{--headers: {--}}
                {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
            {{--}--}}
        {{--});--}}


        {{--console.log('console');--}}

{{--//        submit();--}}
        {{--function submit() {--}}


            {{--$('.btn-user-query-CANCEL').click(function () {--}}

                {{--var questionId = $(this).attr('data-question-id');--}}
                {{--var answerId = $(this).attr('data-answer-id');--}}

                {{--console.log('submit question: ', questionId + ' |  answer ', answerId);--}}

                {{--$.ajax({--}}
                    {{--method: 'post',--}}
                    {{--url: '/search',--}}
                    {{--data: {--}}
{{--//                        '_token': $('[name="_token"]').val(),--}}
                        {{--'answer_id': answerId,--}}
                        {{--'question_id': questionId--}}
                    {{--}--}}
                {{--}).done(function (response, textStatus, xhr) {--}}

                    {{--window.location.href = "/search";--}}

{{--//                    console.log('response', response);--}}
                {{--}).fail(function (errors, textStatus, errorThrown) {--}}
                    {{--console.log('errors ', errorThrown);--}}
                {{--});--}}

            {{--});--}}

        {{--}--}}

        {{--$('.list-group.checked-list-box .list-group-item').each(function () {--}}

            {{--var answerId = $(this).attr('data-answer-id') ;--}}
            {{--var inputAnswer = $('#input-answers');--}}


            {{--// Settings--}}
            {{--var $widget = $(this),--}}
                {{--$checkbox = $('<input data-answer-id="'+answerId+'" type="checkbox" class="hidden" />'),--}}
                {{--color = ($widget.data('color') ? $widget.data('color') : "primary"),--}}
                {{--style = ($widget.data('style') == "button" ? "btn-" : "list-group-item-"),--}}
                {{--settings = {--}}
                    {{--on: {--}}
                        {{--icon: 'glyphicon glyphicon-check'--}}
                    {{--},--}}
                    {{--off: {--}}
                        {{--icon: 'glyphicon glyphicon-unchecked'--}}
                    {{--}--}}
                {{--};--}}

            {{--$widget.css('cursor', 'pointer');--}}
            {{--$widget.find('.checkbox').append($checkbox);--}}

            {{--// Event Handlers--}}
            {{--$widget.on('click', function () {--}}
                {{--var isChecked = !$checkbox.is(':checked');--}}
                {{--$checkbox.prop('checked', isChecked);--}}
                {{--$checkbox.triggerHandler('change');--}}

                {{--var answerId = $(this).attr('data-answer-id');--}}
{{--//                var previousId = $('.btn-user-query').attr('data-answer-id');--}}
                {{--var previousId = inputAnswer.val();--}}

                {{--if (isChecked === true){--}}

                    {{--var answer =[answerId];--}}
                    {{--if (previousId !== ''){--}}
                        {{--answer.push(previousId);--}}
                    {{--}--}}

{{--//                    $('.btn-user-query').attr('data-answer-id', answer);--}}
                    {{--inputAnswer.val(answer);--}}


                {{--} else {--}}

                    {{--var answers = previousId.split(',');--}}

                    {{--var index = answers.indexOf(answerId);--}}
                    {{--if (index !== -1) answers.splice(index, 1);--}}

{{--//                    $('.btn-user-query').attr('data-answer-id', answers);--}}
                    {{--inputAnswer.val(answers);--}}

                {{--}--}}

{{--//                console.log('current: ', $(this).parent().parent().parent());--}}
{{--//--}}
                {{--var next = $(this).parent().parent().parent().next();--}}

{{--//                console.log('next ', next.offset().top);--}}

                {{--if (next.offset().top !== undefined){--}}
                    {{--$('html,body').animate(--}}
                        {{--{--}}
                            {{--scrollTop: next.offset().top--}}
                        {{--}, 1000);--}}
                {{--}--}}

                {{--updateDisplay();--}}
            {{--});--}}

            {{--$checkbox.on('change', function () {--}}
                {{--updateDisplay();--}}
            {{--});--}}


            {{--// Actions--}}
            {{--function updateDisplay() {--}}
                {{--var isChecked = $checkbox.is(':checked');--}}

                {{--// Set the button's state--}}
                {{--$widget.data('state', (isChecked) ? "on" : "off");--}}

                {{--// Set the button's icon--}}
                {{--$widget.find('.state-icon')--}}
                    {{--.removeClass()--}}
                    {{--.addClass('state-icon ' + settings[$widget.data('state')].icon);--}}

                {{--// Update the button's color--}}
                {{--if (isChecked) {--}}
                    {{--$widget.addClass(style + color + ' active');--}}
                {{--} else {--}}
                    {{--$widget.removeClass(style + color + ' active');--}}
                {{--}--}}
            {{--}--}}

            {{--// Initialization--}}
            {{--function init() {--}}

                {{--if ($widget.data('checked') == true) {--}}
                    {{--$checkbox.prop('checked', !$checkbox.is(':checked'));--}}
                {{--}--}}

                {{--updateDisplay();--}}

                {{--// Inject the icon if applicable--}}
                {{--if ($widget.find('.state-icon').length == 0) {--}}
                    {{--$widget.prepend('<span class="state-icon ' + settings[$widget.data('state')].icon + '"></span>');--}}
                {{--}--}}
            {{--}--}}
            {{--init();--}}
        {{--});--}}

        {{--$('#get-checked-data').on('click', function(event) {--}}
            {{--event.preventDefault();--}}
            {{--var checkedItems = {}, counter = 0;--}}


            {{--$("#check-list-box li.active").each(function(idx, li) {--}}
                {{--checkedItems[counter] = $(li).text();--}}
                {{--counter++;--}}
            {{--});--}}

            {{--$('#display-json').html(JSON.stringify(checkedItems, null, '\t'));--}}

        {{--});--}}
    {{--});--}}
{{--</script>--}}