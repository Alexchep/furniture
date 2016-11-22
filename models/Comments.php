<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

class Comments extends ActiveRecord
{
    public static function tableName()
    {
        return 'comments';
    }

    public function rules()
    {
        return [
            [['text', 'author_name', 'status'], 'required'],
            [['date'], 'safe'],
            [['text', 'author_name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Комментарий',
            'author_name' => 'Автор',
            'date' => 'Дата создания',
            'status' => 'Статус',
        ];
    }

}
