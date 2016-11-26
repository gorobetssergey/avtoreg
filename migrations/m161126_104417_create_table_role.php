<?php

use yii\db\Migration;

class m161126_104417_create_table_role extends Migration
{
    public function safeUp()
    {
        $this->createTable('role',[
            'id' => $this->primaryKey(),
            'value' => $this->string(10)->defaultValue('user')
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('role');
    }
}
