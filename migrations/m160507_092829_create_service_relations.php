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

        $this->insert('{{%auth_item}}', [
            'name' => '/service-relation/admin/*',
            'type' => 2,
            'created_at' => 1467629406,
            'updated_at' => 1467629406
        ]);
        $this->insert('{{%auth_item}}', [
            'name' => 'service_relation_management',
            'type' => 2,
            'created_at' => 1467629406,
            'updated_at' => 1467629406
        ]);
        $this->insert('{{%auth_item_child}}', [
            'parent' => 'service_relation_management',
            'child' => '/service-relation/admin/*',
        ]);
        $this->insert('{{%auth_item}}', [
            'name' => 'service_relation_manager',
            'type' => 1,
            'created_at' => 1467629406,
            'updated_at' => 1467629406
        ]);
        $this->insert('{{%auth_item_child}}', [
            'parent' => 'service_relation_manager',
            'child' => 'service_relation_management',
        ]);
        $this->insert('{{%auth_item_child}}', [
            'parent' => 'super_admin',
            'child' => 'service_relation_manager',
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%auth_item_child}}', [
            'parent' => 'super_admin',
            'child' => 'service_relation_manager',
        ]);
        $this->delete('{{%auth_item_child}}', [
            'parent' => 'service_relation_manager',
            'child' => 'service_relation_management',
        ]);
        $this->delete('{{%auth_item}}', [
            'name' => 'service_relation_manager',
            'type' => 1,
        ]);
        $this->delete('{{%auth_item_child}}', [
            'parent' => 'service_relation_management',
            'child' => '/service-relation/admin/*',
        ]);
        $this->delete('{{%auth_item}}', [
            'name' => 'service_relation_management',
            'type' => 2,
        ]);
        $this->delete('{{%auth_item}}', [
            'name' => '/service-relation/admin/*',
            'type' => 2,
        ]);

        $this->dropTable('{{%service_relation}}');
    }
}
