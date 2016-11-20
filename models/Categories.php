<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

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

    public function getListWithoutSelectCat($id)
    {
        $categories = self::find()->all();
        $result = ArrayHelper::map($categories, 'id', 'name');
        $items = ArrayHelper::remove($result, $id);

        return $items;
    }

}
