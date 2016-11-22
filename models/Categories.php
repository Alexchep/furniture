<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

class Categories extends ActiveRecord
{

    public static function tableName()
    {
        return 'categories';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'parent_id' => 'Родительская категория',
        ];
    }

    public function getGalleries()
    {
        return $this->hasMany(Galleries::className(), ['category_id' => 'id']);
    }

//    public function getListWithoutSelectCat($id)
//    {
//        $categories = self::find()->all();
//        $items = ArrayHelper::map($categories, 'id', 'name');
//        ArrayHelper::remove($items, $id);
//
//        return $items;
//    }

}
