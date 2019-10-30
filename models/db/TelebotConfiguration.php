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
    const STATUS_ACTIVE = '1';
    const STATSU_DISACTIVE = '0';

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

    /**
     * @param string $type
     * @return string
     */
    public static function getValueByType(string $type): string
    {
        $model = self::find()->where(['type' => $type])->one();
        return $model->value;
    }

    /**
     * @param string $type
     * @param string $value
     */
    public static function updateValueByType(string $type, string $value)
    {
        $model = self::find()->where(['type' => $type])->one();
        $model->value = $value;
        $model->save();
    }

    /**
     * @return int
     */
    public static function getStatus(): int
    {
        return (int)(self::find()->select(['value'])->where(['type' => 'web_hook_status'])->column())[0];
    }

    /**
     * @return string
     */
    public static function getTelebotUrl(): string
    {
        $telebotName = (self::find()->select(['value'])->where(['type' => 'username_bot'])->column())[0];
        return 'https://t.me/' . $telebotName;
    }
}
