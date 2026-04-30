-- Add specialty_id column to diagnose table
ALTER TABLE diagnose ADD COLUMN specialty_id INT NULL AFTER user_id;

-- Add foreign key constraint (optional, if specialties table exists)
-- ALTER TABLE diagnose ADD CONSTRAINT fk_diagnose_specialty 
--     FOREIGN KEY (specialty_id) REFERENCES specialties(id) 
--     ON DELETE SET NULL ON UPDATE CASCADE;
