<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Soft-cancel support for queued appointments, plus the indexes the queue and
 * profile queries need.
 *
 * Before this, the only way to clear a no-show from the waiting list was a hard
 * delete, which threw the visit away. Every step is guarded so the migration is
 * safe to re-run and safe on databases where the columns were added by hand.
 */
class Migration_Add_appointment_cancellation extends CI_Migration {

    public function up()
    {
        if (!$this->db->field_exists('cancelled_at', 'appointment')) {
            $this->dbforge->add_column('appointment', array(
                'cancelled_at' => array(
                    'type' => 'DATETIME',
                    'null' => TRUE,
                    'default' => NULL,
                    'after' => 'visible',
                ),
            ));
        }

        if (!$this->db->field_exists('cancel_reason', 'appointment')) {
            $this->dbforge->add_column('appointment', array(
                'cancel_reason' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => TRUE,
                    'default' => NULL,
                    'after' => 'cancelled_at',
                ),
            ));
        }

        // Neither table shipped with an index beyond the primary key, so the
        // queue and profile pages were full-scanning both of them.
        $this->add_index('appointment', 'idx_appointment_patient', '(patient_id)');
        $this->add_index('appointment', 'idx_appointment_clinic_visible', '(clinic_id, visible)');
        $this->add_index('diagnose', 'idx_diagnose_appointment', '(appointment_id)');
        $this->add_index('diagnose', 'idx_diagnose_patient', '(patient_id)');
        $this->add_index('diagnose', 'idx_diagnose_clinic_date', '(clinic_id, date)');
    }

    public function down()
    {
        if ($this->db->field_exists('cancel_reason', 'appointment')) {
            $this->dbforge->drop_column('appointment', 'cancel_reason');
        }
        if ($this->db->field_exists('cancelled_at', 'appointment')) {
            $this->dbforge->drop_column('appointment', 'cancelled_at');
        }

        foreach (array(
            'appointment' => array('idx_appointment_patient', 'idx_appointment_clinic_visible'),
            'diagnose'    => array('idx_diagnose_appointment', 'idx_diagnose_patient', 'idx_diagnose_clinic_date'),
        ) as $table => $keys) {
            foreach ($keys as $key) {
                if ($this->index_exists($table, $key)) {
                    $this->db->query("ALTER TABLE `$table` DROP INDEX `$key`");
                }
            }
        }
    }

    private function add_index($table, $name, $columns)
    {
        if (!$this->db->table_exists($table) || $this->index_exists($table, $name)) {
            return;
        }
        $this->db->query("ALTER TABLE `$table` ADD INDEX `$name` $columns");
    }

    private function index_exists($table, $name)
    {
        if (!$this->db->table_exists($table)) {
            return FALSE;
        }
        return $this->db->query("SHOW INDEX FROM `$table` WHERE Key_name = " . $this->db->escape($name))->num_rows() > 0;
    }
}
