-- Add specialty_id column to diagnose table (idempotent — safe to re-run)
SET @col_exists := (
  SELECT COUNT(*) FROM information_schema.COLUMNS
  WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'diagnose'
    AND COLUMN_NAME = 'specialty_id'
);
SET @sql := IF(@col_exists = 0,
  'ALTER TABLE diagnose ADD COLUMN specialty_id INT NULL AFTER user_id',
  'SELECT ''specialty_id already exists — skipped'' AS info');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Add foreign key constraint (optional, if specialties table exists)
-- ALTER TABLE diagnose ADD CONSTRAINT fk_diagnose_specialty 
--     FOREIGN KEY (specialty_id) REFERENCES specialties(id) 
--     ON DELETE SET NULL ON UPDATE CASCADE;
