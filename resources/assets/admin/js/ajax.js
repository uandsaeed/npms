
$(document).ready(function () {

    /**
     * Set csrf token to all ajax call
     */

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name="_token"]').val()
        }
    });

});