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

    public function getListWithoutSelectCat($name)
    {
        $categories = $this->find()->all();
        $list_name = [];
        foreach ($categories as $category) {
            $list_name[] = $category->name;
        }
        while (($i = array_search($name, $list_name)) !== false) {
            unset($list_name[$i]);
        }

        return $list_name;
    }

}
