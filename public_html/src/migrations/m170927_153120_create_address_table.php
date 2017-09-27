<?php

use yii\db\Migration;

/**
 * Handles the creation of table `address`.
 */
class m170927_153120_create_address_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('address', [
            'id' => $this->primaryKey(),
            'address' => $this->text(),
            'comment' => $this->text(),
            'user_id' => $this->integer(),
        ]);
        $this->addForeignKey("address_user_fk","address", "user_id", "users", "id", "CASCADE", "CASCADE");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('address');
    }
}
