//Закрытие модального окна на site/index

//Отправка алерта до отправки формы
$(document).on('pjax:beforeSend', function() {
    var name = $('#comments-author_name').val();
    alert('Спасибо за отзыв ' + name + '!');
});
//Иммитация нажатияна кнопку "Закрыть" в попапе
$(document).on('pjax:complete', function() {
    $('#close-modal').trigger('click');
});


//Модальное окно в admin/comment/index
$(function(){
    $('#comment-button').click(function(){
        $('#modal-comment-admin').modal('show')
            .find('#adminComment')
            .load($(this).attr('value'));
    });
});