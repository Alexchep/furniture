$(document).on('pjax:beforeSend', function() {
    var name = $('#comments-author_name').val();
    alert('Спасибо за отзыв ' + name + '!');
});
$(document).on('pjax:complete', function() {
    $('#close-modal').trigger('click');
});