$(document).on('pjax:complete', function() {
    $('#modal-comment').hide().removeClass('in');
    $('.modal-backdrop').hide().removeClass('in');
    alert('done');
});