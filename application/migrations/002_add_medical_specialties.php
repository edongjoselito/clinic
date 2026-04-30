<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_medical_specialties extends CI_Migration {

    public function up()
    {
        // Create specialties table
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
            ),
            'category' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'comment' => 'primary_care, medical_specialist, surgical, womens_health, mental_health, diagnostic'
            ),
            'description' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'created_at' => array(
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('specialties');

        // Insert all medical specialties
        $specialties = array(
            // Primary Care Doctors
            array('name' => 'Family Medicine', 'category' => 'primary_care', 'description' => 'Treats patients of all ages (children to seniors)'),
            array('name' => 'Internal Medicine', 'category' => 'primary_care', 'description' => 'Focuses on adults'),
            array('name' => 'Pediatrician', 'category' => 'primary_care', 'description' => 'Treats infants, children, and teenagers'),
            array('name' => 'General Practitioner', 'category' => 'primary_care', 'description' => 'Broad medical care (common in many countries)'),
            
            // Medical Specialists (Non-Surgical)
            array('name' => 'Cardiologist', 'category' => 'medical_specialist', 'description' => 'Heart and blood vessels'),
            array('name' => 'Endocrinologist', 'category' => 'medical_specialist', 'description' => 'Hormones, diabetes, thyroid'),
            array('name' => 'Gastroenterologist', 'category' => 'medical_specialist', 'description' => 'Stomach, intestines, liver'),
            array('name' => 'Pulmonologist', 'category' => 'medical_specialist', 'description' => 'Lungs and breathing'),
            array('name' => 'Nephrologist', 'category' => 'medical_specialist', 'description' => 'Kidneys'),
            array('name' => 'Neurologist', 'category' => 'medical_specialist', 'description' => 'Brain, nerves, migraines, seizures'),
            array('name' => 'Rheumatologist', 'category' => 'medical_specialist', 'description' => 'Arthritis, autoimmune diseases'),
            array('name' => 'Hematologist', 'category' => 'medical_specialist', 'description' => 'Blood disorders'),
            array('name' => 'Oncologist', 'category' => 'medical_specialist', 'description' => 'Cancer'),
            array('name' => 'Allergist / Immunologist', 'category' => 'medical_specialist', 'description' => 'Allergies, immune system'),
            array('name' => 'Infectious Disease Specialist', 'category' => 'medical_specialist', 'description' => 'Complex infections'),
            
            // Surgical Specialists
            array('name' => 'General Surgeon', 'category' => 'surgical', 'description' => 'Common surgeries (appendix, gallbladder)'),
            array('name' => 'Orthopedic Surgeon', 'category' => 'surgical', 'description' => 'Bones, joints, sports injuries'),
            array('name' => 'Neurosurgeon', 'category' => 'surgical', 'description' => 'Brain and spine surgery'),
            array('name' => 'Cardiothoracic Surgeon', 'category' => 'surgical', 'description' => 'Heart and chest surgery'),
            array('name' => 'Plastic Surgeon', 'category' => 'surgical', 'description' => 'Reconstructive or cosmetic surgery'),
            array('name' => 'Urologist', 'category' => 'surgical', 'description' => 'Urinary system and male reproductive organs'),
            array('name' => 'ENT (Otolaryngologist)', 'category' => 'surgical', 'description' => 'Ear, nose, throat'),
            array('name' => 'Ophthalmologist', 'category' => 'surgical', 'description' => 'Eye diseases and surgery'),
            
            // Women's Health
            array('name' => 'Reproductive Endocrinologist', 'category' => 'womens_health', 'description' => 'Fertility and hormone issues'),
            array('name' => 'Urogynecologist', 'category' => 'womens_health', 'description' => 'Pelvic floor and bladder issues'),
            array('name' => 'OB-GYN', 'category' => 'womens_health', 'description' => 'Obstetrics and Gynecology'),
            
            // Mental Health
            array('name' => 'Psychiatrist', 'category' => 'mental_health', 'description' => 'Mental health, medication'),
            array('name' => 'Psychologist', 'category' => 'mental_health', 'description' => 'Therapy and counseling (no meds)'),
            
            // Diagnostic / Support Specialties
            array('name' => 'Radiologist', 'category' => 'diagnostic', 'description' => 'Interprets X-rays, CT scans, MRI'),
            array('name' => 'Pathologist', 'category' => 'diagnostic', 'description' => 'Diagnoses diseases through lab tests'),
            array('name' => 'Anesthesiologist', 'category' => 'diagnostic', 'description' => 'Pain control during surgery'),
            array('name' => 'Emergency Medicine Doctor', 'category' => 'diagnostic', 'description' => 'ER care'),
        );

        $this->db->insert_batch('specialties', $specialties);

        // Add specialty_id column to users table
        $this->dbforge->add_column('users', array(
            'specialty_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
                'after' => 'position',
            ),
        ));

        // Add foreign key constraint
        $this->db->query('ALTER TABLE `users` ADD CONSTRAINT `fk_users_specialty` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`id`) ON DELETE SET NULL ON UPDATE CASCADE');

        // Add specialty_id column to diagnose table
        $this->dbforge->add_column('diagnose', array(
            'specialty_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
                'after' => 'user_id',
            ),
        ));

        // Add foreign key constraint
        $this->db->query('ALTER TABLE `diagnose` ADD CONSTRAINT `fk_diagnose_specialty` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`id`) ON DELETE SET NULL ON UPDATE CASCADE');
    }

    public function down()
    {
        // Drop foreign keys
        $this->db->query('ALTER TABLE `users` DROP FOREIGN KEY `fk_users_specialty`');
        $this->db->query('ALTER TABLE `diagnose` DROP FOREIGN KEY `fk_diagnose_specialty`');

        // Drop columns
        $this->dbforge->drop_column('users', 'specialty_id');
        $this->dbforge->drop_column('diagnose', 'specialty_id');

        // Drop table
        $this->dbforge->drop_table('specialties');
    }
}
