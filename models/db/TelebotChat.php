<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "telebot_chat".
 *
 * @property int $id
 * @property string $user_question
 * @property string $bot_answer
 * @property string $created_at
 * @property string $updated_at
 */
class TelebotChat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telebot_chat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_question', 'bot_answer'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_question', 'bot_answer'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_question' => 'User Question',
            'bot_answer' => 'Bot Answer',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
