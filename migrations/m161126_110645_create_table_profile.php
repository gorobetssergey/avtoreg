<?php

use yii\db\Migration;

class m161126_110645_create_table_profile extends Migration
{
    public function safeUp()
    {
        $this->createTable('profile',[
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'ownership' => $this->integer()->notNull(),
            'tel_first' => $this->string(20)->notNull(),
            'tel_sec' => $this->string(20)->defaultValue(''),
            'tel_next' => $this->string(20)->defaultValue(''),
            'name' => $this->string(50)->defaultValue('ded'),
            'surname' => $this->string(50)->defaultValue('mozay'),
            'patronymic' => $this->string(50)->defaultValue('klaus'),
            'city' => $this->string(50)->defaultValue('Moskow'),
            'level' => $this->integer()->defaultValue(0)
        ]);

        $this->createIndex(
            'idx-user_id_profile',
            'profile',
            'user_id'
        );
        $this->addForeignKey(
            'fk-user_id_profile',
            'profile',//table items
            'user_id',//items.top_id
            'users',//table topmenu
            'id',//topmenu.id
            'CASCADE'
        );
        $this->createIndex(
            'idx-ownership_profile',
            'profile',
            'ownership'
        );
        $this->addForeignKey(
            'fk-ownership_profile',
            'profile',//table items
            'ownership',//items.top_id
            'ownership',//table topmenu
            'id',//topmenu.id
            'CASCADE'
        );
        $this->createIndex(
            'idx-level_profile',
            'profile',
            'level'
        );
        $this->addForeignKey(
            'fk-level_profile',
            'profile',//table items
            'level',//items.top_id
            'level',//table topmenu
            'id',//topmenu.id
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-user_id_profile',
            'profile'
        );
        $this->dropIndex(
            'idx-user_id_profile',
            'profile'
        );
        $this->dropForeignKey(
            'fk-ownership_profile',
            'profile'
        );
        $this->dropIndex(
            'idx-ownership_profile',
            'profile'
        );
        $this->dropForeignKey(
            'fk-level_profile',
            'profile'
        );
        $this->dropIndex(
            'idx-level_profile',
            'profile'
        );
        $this->dropTable('profile');
    }
}
