-- Create specialties table
CREATE TABLE IF NOT EXISTS `specialties` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) DEFAULT NULL COMMENT 'primary_care, medical_specialist, surgical, womens_health, mental_health, diagnostic',
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Insert medical specialties
INSERT INTO `specialties` (`name`, `category`, `description`) VALUES
('Family Medicine', 'primary_care', 'Treats patients of all ages (children to seniors)'),
('Internal Medicine', 'primary_care', 'Focuses on adults'),
('Pediatrician', 'primary_care', 'Treats infants, children, and teenagers'),
('General Practitioner', 'primary_care', 'Broad medical care (common in many countries)'),
('Cardiologist', 'medical_specialist', 'Heart and blood vessels'),
('Endocrinologist', 'medical_specialist', 'Hormones, diabetes, thyroid'),
('Gastroenterologist', 'medical_specialist', 'Stomach, intestines, liver'),
('Pulmonologist', 'medical_specialist', 'Lungs and breathing'),
('Nephrologist', 'medical_specialist', 'Kidneys'),
('Neurologist', 'medical_specialist', 'Brain, nerves, migraines, seizures'),
('Rheumatologist', 'medical_specialist', 'Arthritis, autoimmune diseases'),
('Hematologist', 'medical_specialist', 'Blood disorders'),
('Oncologist', 'medical_specialist', 'Cancer'),
('Allergist / Immunologist', 'medical_specialist', 'Allergies, immune system'),
('Infectious Disease Specialist', 'medical_specialist', 'Complex infections'),
('General Surgeon', 'surgical', 'Common surgeries (appendix, gallbladder)'),
('Orthopedic Surgeon', 'surgical', 'Bones, joints, sports injuries'),
('Neurosurgeon', 'surgical', 'Brain and spine surgery'),
('Cardiothoracic Surgeon', 'surgical', 'Heart and chest surgery'),
('Plastic Surgeon', 'surgical', 'Reconstructive or cosmetic surgery'),
('Urologist', 'surgical', 'Urinary system and male reproductive organs'),
('ENT (Otolaryngologist)', 'surgical', 'Ear, nose, throat'),
('Ophthalmologist', 'surgical', 'Eye diseases and surgery'),
('Reproductive Endocrinologist', 'womens_health', 'Fertility and hormone issues'),
('Urogynecologist', 'womens_health', 'Pelvic floor and bladder issues'),
('OB-GYN', 'womens_health', 'Obstetrics and Gynecology'),
('Psychiatrist', 'mental_health', 'Mental health, medication'),
('Psychologist', 'mental_health', 'Therapy and counseling (no meds)'),
('Radiologist', 'diagnostic', 'Interprets X-rays, CT scans, MRI'),
('Pathologist', 'diagnostic', 'Diagnoses diseases through lab tests'),
('Anesthesiologist', 'diagnostic', 'Pain control during surgery'),
('Emergency Medicine Doctor', 'diagnostic', 'ER care');

-- Add specialty_id column to users table
ALTER TABLE `users` ADD COLUMN IF NOT EXISTS `specialty_id` int(11) unsigned DEFAULT NULL AFTER `position`;

-- Add foreign key constraint for users.specialty_id
ALTER TABLE `users` ADD CONSTRAINT `fk_users_specialty` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

-- Add specialty_id column to diagnose table
ALTER TABLE `diagnose` ADD COLUMN IF NOT EXISTS `specialty_id` int(11) unsigned DEFAULT NULL AFTER `user_id`;

-- Add foreign key constraint for diagnose.specialty_id
ALTER TABLE `diagnose` ADD CONSTRAINT `fk_diagnose_specialty` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

-- Add patient portal access columns to patients table
ALTER TABLE `patients` ADD COLUMN IF NOT EXISTS `email` varchar(150) DEFAULT NULL AFTER `contact`;
ALTER TABLE `patients` ADD COLUMN IF NOT EXISTS `portal_access` tinyint(1) NOT NULL DEFAULT 0 AFTER `email`;
ALTER TABLE `patients` ADD COLUMN IF NOT EXISTS `password` varchar(255) DEFAULT NULL AFTER `portal_access`;

-- Add unique index on email
ALTER TABLE `patients` ADD UNIQUE INDEX IF NOT EXISTS `idx_patients_email` (`email`);
