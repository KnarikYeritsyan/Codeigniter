<?php

//defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_Add_user extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(
            array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
                    'auto_increment' => true
                ),

                'email' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'password' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'phone' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
            )
        );

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}