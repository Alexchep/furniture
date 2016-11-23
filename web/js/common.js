//Закрытие модального окна на site/index

//Отправка алерта до отправки формы
$(document).on('pjax:beforeSend', "#w1", function() {
    var name = $('#comments-author_name').val();
    alert('Спасибо за отзыв ' + name + '!');
});
//Иммитация нажатияна кнопку "Закрыть" в попапе
$(document).on('pjax:complete', "#w1", function() {
    $('#close-modal').trigger('click');
});


//Модальное окно для создания коммента в admin/comment/index
$(function(){
    $('#comment-button').click(function(){
        $('#modal-comment-admin')
            .modal('show')
            .find('#adminComment')
            .load($(this).attr('value'));
    });
});

//Модальное окно для создания категории в admin/category/index
$(function(){
    $('#category-button').click(function(){
        $('#modal-category-admin')
            .modal('show')
            .find('#adminCategory')
            .load($(this).attr('value'));
    });
});

//Модальное окно для создания галереи в admin/gallery/index
$(function(){
    $('#gallery-button').click(function(){
        $('#modal-gallery-admin')
            .modal('show')
            .find('#adminGallery')
            .load($(this).attr('value'));
    });
});