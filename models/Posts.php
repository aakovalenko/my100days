<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $picture
 * @property int $date_create
 * @property int $date_update
 * @property string $url
 * @property int $status_id
 * @property int $sort
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date_create', 'date_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date_update'],
                ],
                // если вместо метки времени UNIX используется datetime:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['date_create', 'date_update', 'status_id', 'sort'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['picture'], 'string', 'max' => 255],
            [['url'], 'string', 'max' => 150],
            [['url'],'required'],
            [['sort'],'integer','max'=>99,'min'=>1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'picture' => 'Picture',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'url' => 'Url',
            'status_id' => 'Status',
            'sort' => 'Sort',
        ];
    }
}
