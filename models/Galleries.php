<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "galleries".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $path_to_pic
 * @property integer $category_id
 *
 * @property Categories $category
 */
class Galleries extends ActiveRecord
{

    public static function tableName()
    {
        return 'galleries';
    }

    public function rules()
    {
        return [
            [['title', 'description', 'path_to_pic', 'category_id'], 'required'],
            [['description'], 'string'],
            [['category_id'], 'integer'],
            [['title'], 'string', 'max' => 150],
            [['path_to_pic'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'path_to_pic' => 'Изображение',
            'category_id' => 'Категория',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    public function getCategoryName($category_id)
    {
        $category = Categories::findOne($category_id);
        $category_name = $category->name;

        return $category_name;
    }

}