<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "telebot_configuration".
 *
 * @property int $id
 * @property string $type
 * @property string $title
 * @property string $value
 * @property string $created_at
 * @property string $updated_at
 */
class TelebotConfiguration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telebot_configuration';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'title', 'value'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['type', 'title', 'value'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'title' => 'Title',
            'value' => 'Value',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
