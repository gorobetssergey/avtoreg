<?php

use yii\db\Migration;

class m161126_110641_create_table_level extends Migration
{
    public function safeUp()
    {
        $this->createTable('level',[
            'id' => $this->primaryKey(),
            'value' => $this->string(50)
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('level');
    }
}
