<?php

use yii\db\Migration;

class m161126_110640_create_table_ownership extends Migration
{
    public function safeUp()
    {
        $this->createTable('ownership',[
            'id' => $this->primaryKey(),
            'value' => $this->string(50)->notNull(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('ownership');
    }
}
