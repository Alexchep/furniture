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

    public function getListWithoutSelectCat($id)
    {
        $categories = $this->find()->all();
        $list_name = [];
        foreach ($categories as $category) {
            if($category->id != $id){
                array_push($list_name, [$category->id => "$category->name"]);
            }
        }

        return $list_name;
    }

}
