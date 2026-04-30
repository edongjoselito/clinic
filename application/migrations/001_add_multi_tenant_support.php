<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_multi_tenant_support extends CI_Migration {

    public function up()
    {
        // Create clinics table
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'code' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => FALSE,
                'unique' => TRUE
            ),
            'address' => array(
                'type' => 'TEXT',
                'null' => TRUE
            ),
            'contact_number' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE
            ),
            'status' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1,
                'comment' => '0=inactive, 1=active'
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('clinics');

        // Add clinic_id to users table
        $this->dbforge->add_column('users', array(
            'clinic_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
                'after' => 'id'
            ),
            'is_superadmin' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
                'after' => 'clinic_id'
            )
        ));

        // Add clinic_id to patients table
        $this->dbforge->add_column('patients', array(
            'clinic_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
                'after' => 'id'
            )
        ));

        // Add clinic_id to appointment table
        $this->dbforge->add_column('appointment', array(
            'clinic_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
                'after' => 'id'
            )
        ));

        // Add clinic_id to items table
        $this->dbforge->add_column('items', array(
            'clinic_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
                'after' => 'id'
            )
        ));

        // Add clinic_id to referrals table
        $this->dbforge->add_column('referrals', array(
            'clinic_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
                'after' => 'id'
            )
        ));

        // Add clinic_id to expenses table
        $this->dbforge->add_column('expenses', array(
            'clinic_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
                'after' => 'id'
            )
        ));

        // Add clinic_id to diagnose table
        $this->dbforge->add_column('diagnose', array(
            'clinic_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
                'after' => 'id'
            )
        ));

        // Add clinic_id to sales table
        $this->dbforge->add_column('sales', array(
            'clinic_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
                'after' => 'id'
            )
        ));

        // Add clinic_id to sales_summary table
        $this->dbforge->add_column('sales_summary', array(
            'clinic_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
                'after' => 'id'
            )
        ));

        // Add clinic_id to stocks table
        $this->dbforge->add_column('stocks', array(
            'clinic_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
                'after' => 'id'
            )
        ));

        // Add clinic_id to stock_summary table
        $this->dbforge->add_column('stock_summary', array(
            'clinic_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
                'after' => 'id'
            )
        ));

        // Insert default clinic for existing data
        $default_clinic = array(
            'name' => 'Default Clinic',
            'code' => 'DEFAULT',
            'address' => 'Default Address',
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('clinics', $default_clinic);
        $default_clinic_id = $this->db->insert_id();

        // Update existing records with default clinic_id
        $this->db->update('users', array('clinic_id' => $default_clinic_id, 'is_superadmin' => 1));
        $this->db->update('patients', array('clinic_id' => $default_clinic_id));
        $this->db->update('appointment', array('clinic_id' => $default_clinic_id));
        $this->db->update('items', array('clinic_id' => $default_clinic_id));
        $this->db->update('referrals', array('clinic_id' => $default_clinic_id));
        $this->db->update('expenses', array('clinic_id' => $default_clinic_id));
        $this->db->update('diagnose', array('clinic_id' => $default_clinic_id));
        $this->db->update('sales', array('clinic_id' => $default_clinic_id));
        $this->db->update('sales_summary', array('clinic_id' => $default_clinic_id));
        $this->db->update('stocks', array('clinic_id' => $default_clinic_id));
        $this->db->update('stock_summary', array('clinic_id' => $default_clinic_id));
    }

    public function down()
    {
        // Drop clinic_id columns
        $this->dbforge->drop_column('users', 'clinic_id');
        $this->dbforge->drop_column('users', 'is_superadmin');
        $this->dbforge->drop_column('patients', 'clinic_id');
        $this->dbforge->drop_column('appointment', 'clinic_id');
        $this->dbforge->drop_column('items', 'clinic_id');
        $this->dbforge->drop_column('referrals', 'clinic_id');
        $this->dbforge->drop_column('expenses', 'clinic_id');
        $this->dbforge->drop_column('diagnose', 'clinic_id');
        $this->dbforge->drop_column('sales', 'clinic_id');
        $this->dbforge->drop_column('sales_summary', 'clinic_id');
        $this->dbforge->drop_column('stocks', 'clinic_id');
        $this->dbforge->drop_column('stock_summary', 'clinic_id');

        // Drop clinics table
        $this->dbforge->drop_table('clinics');
    }
}
