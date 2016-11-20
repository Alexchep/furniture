<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property string $text
 * @property string $author_name
 * @property string $date
 * @property integer $status
 */
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
