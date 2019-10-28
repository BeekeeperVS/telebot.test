<?php

use yii\db\Migration;

/**
 * Class m191027_222729_create_table_telebot_configuration
 */
class m191027_222729_create_table_telebot_configuration extends Migration
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

        $this->createTable('{{%telebot_configuration}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string(100)->notNull(),
            'title' => $this->string(100)->notNull(),
            'value' => $this->string(100)->notNull(),
            'created_at' => $this->dateTime()->notNull()->defaultValue(date('Y-m-d H:i:s')),
            'updated_at' => $this->dateTime()->notNull()->defaultValue(date('Y-m-d H:i:s')),
        ], $tableOptions);

        $this->createIndex(
            'idx-type-telebot_configuration',
            '{{%telebot_configuration}}',
            'type'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dateTime('{{%telebot_configuration}}');
    }
}
