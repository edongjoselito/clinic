-- Soft-cancel support for queued appointments.
-- Before this, the only way to clear a no-show from the queue was Pages/app_delete,
-- which hard-deleted the row and lost the visit entirely.
ALTER TABLE appointment
  ADD COLUMN cancelled_at DATETIME NULL DEFAULT NULL AFTER visible,
  ADD COLUMN cancel_reason VARCHAR(255) NULL DEFAULT NULL AFTER cancelled_at;

-- Neither table had any index beyond the primary key, so every profile/queue
-- page was full-scanning ~158k appointments against ~160k diagnoses.
ALTER TABLE appointment
  ADD INDEX idx_appointment_patient (patient_id),
  ADD INDEX idx_appointment_clinic_visible (clinic_id, visible);
ALTER TABLE diagnose
  ADD INDEX idx_diagnose_appointment (appointment_id),
  ADD INDEX idx_diagnose_patient (patient_id),
  ADD INDEX idx_diagnose_clinic_date (clinic_id, date);
