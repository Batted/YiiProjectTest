<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%feedback}}`.
 */
class m201216_155028_create_feedback_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%feedback}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'subject' => $this->string()->notNull(),
            'message' => $this->string()->notNull(),
            'date_create' => $this->integer()->notNull(),
        ]);
        
        
    }

    public function down()
    {
        $this->dropTable('feedback');
    }

    /**
     * {@inheritdoc}
     */
    // public function safeUp()
    // {
    // }

    /**
     * {@inheritdoc}
     */
    // public function safeDown()
    // {
        
    // }
}
