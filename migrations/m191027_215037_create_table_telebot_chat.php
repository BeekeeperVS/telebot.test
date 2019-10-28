<?php

use yii\db\Migration;

/**
 * Class m191027_215037_create_table_telebot_chat
 */
class m191027_215037_create_table_telebot_chat extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%telebot_chat}}', [
            'id' => $this->primaryKey(),
            'user_question' => $this->string(100)->notNull(),
            'bot_answer' => $this->string(100)->notNull(),
            'created_at' => $this->dateTime()->notNull()->defaultValue(date('Y-m-d H:i:s')),
            'updated_at' => $this->dateTime()->notNull()->defaultValue(date('Y-m-d H:i:s')),
        ], $tableOptions);

        $this->createIndex(
            'idx-user_question-telebot_chat',
            '{{%telebot_chat}}',
            'user_question'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dateTime('{{%telebot_chat}}');
    }

}
