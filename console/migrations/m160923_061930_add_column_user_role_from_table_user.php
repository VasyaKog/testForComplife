<?php

use yii\db\Migration;

class m160923_061930_add_column_user_role_from_table_user extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'role', $this->integer());
    }

    public function down()
    {
        $this->dropColumn('user', 'role');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
