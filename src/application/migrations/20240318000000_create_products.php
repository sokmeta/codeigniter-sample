<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_products extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'description' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'price' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ),
            'created_at' => array(
                'type' => 'DATETIME',
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('products');
    }

    public function down()
    {
        $this->dbforge->drop_table('products');
    }
}
