<?php

use yii\db\Migration;
use app\models\Feedback;


class m210108_035532_edit_date_create_in_feedback extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(Feedback::tableName(),'date_create1', $this->dateTime()->notNull()->defaultExpression('NOW()'));
        foreach (Feedback::find()->each() as $value) {
            $value->date_create1 = date('Y-m-d H:i:s', $value->date_create);
            $value->save();
        }
        $this->dropColumn(Feedback::tableName(),'date_create');
        $this->renameColumn(Feedback::tableName(),'date_create1', 'date_create');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn(Feedback::tableName(),'date_create1', $this->integer()->notNull());
        foreach (Feedback::find()->each() as $value) {
            $value->date_create1 = strtotime($value->date_create);
            $value->save();
        }
        $this->dropColumn(Feedback::tableName(),'date_create');
        $this->renameColumn(Feedback::tableName(),'date_create1', 'date_create');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210108_035532_edit_date_create_in_feedback cannot be reverted.\n";

        return false;
    }
    */
}
