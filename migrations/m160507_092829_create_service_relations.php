<?php

use yii\db\Migration;

class m160507_092829_create_service_relations extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%service_relation}}', [
            'id' => $this->primaryKey(),
            'service1_id' => $this->integer()->notNull()->defaultValue(0),
            'item1_id' => $this->integer()->notNull()->defaultValue(0),
            'service2_id' => $this->integer()->notNull()->defaultValue(0),
            'item2_id' => $this->integer()->notNull()->defaultValue(0),
            'relation_type' => $this->smallInteger()->notNull()->defaultValue(0),
            'sort_order' => $this->smallInteger()->notNull()->defaultValue(0),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'update_time' => $this->timestamp()->notNull(),
            'creation_time' => $this->timestamp()->notNull(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%service_relation}}');
    }
}
