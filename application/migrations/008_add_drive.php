<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_drive extends CI_Migration
{
    /**
     * Run the migration.
     */
    public function up()
    {
        $this->dbforge->add_field(array(
            'ID' => array(
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ),
            'Naam' => array(
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ),
            'file_name' => array(
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ),
            'file_path' => array(
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ),
            'file_extension' => array(
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ),
            'file_size' => array(
                'type'       => 'VARCHAR',
                'constraint' => 255,
            )
        ));
    }

    /**
     * Revert the migration.
     */
    public function down()
    {
        $this->dbforge->drop_table('Drive');
    }
}