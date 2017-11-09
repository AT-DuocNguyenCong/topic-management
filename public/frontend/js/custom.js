$(document).ready(function() {
    ($('#msg-booking').text()) ? $('#booking-modal').modal('show') : $('#booking-modal').modal('hide');

    $('.btn-delete-item').bind('click',function(e){
        e.preventDefault();
        var form = $(this.form);
        var title = $(this).attr('data-title');
        var body = '<i>' + $(this).attr('data-confirm') + '</i>';
        $('#title-content').html(title);
        $('#body-content').html(body);
        $('#confirm').modal('show');
        $('#delete-btn').one('click', function(){
            form.submit();
            $('#confirm').modal('hide');
        })
    });
    var index = 0;
    $('#js-btn-search-show').click(function(){
        if (index%2 == 0) {
            $('#js-search-form').fadeIn("slow");
            $('#js-btn-search-show').html('<i class="glyphicon glyphicon-remove">');
        } else {
            $('#js-search-form').fadeOut("slow");
            $('#js-btn-search-show').html('<i class="glyphicon glyphicon-search">');
        }
        index++;
    });
});