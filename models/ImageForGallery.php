<?php
namespace app\models;

use yii\base\Model;

class ImageForGallery extends Model
{

    public $picture;

    public function rules()
    {
        return [
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

}