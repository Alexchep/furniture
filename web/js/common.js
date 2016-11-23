//Закрытие модального окна на site/index
$('body').on( 'click', '#sendComm', function() {
    var name = $('#comments-author_name').val();
    var closeBut = $('#close-modal');
    closeBut.trigger('click');
    var divAlert = $('#alert-div');
    divAlert.css({"display" : "block"}).html('Спасибо за отзыв, ' + name + '!');
    var explode = function () {
        divAlert.css({"display" : "none"});
    };
    setTimeout(explode, 3000);
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