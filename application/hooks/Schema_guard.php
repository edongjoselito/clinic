<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Applies pending database migrations automatically, so a deploy never needs a
 * manual ALTER on production.
 *
 * Runs on post_controller_constructor. After a successful run it writes a
 * marker file and short-circuits on every later request, so the normal cost is
 * one file read.
 */
class Schema_guard {

    public function run()
    {
        $CI =& get_instance();

        // config/migration.php is only pulled in when the library loads, so read
        // it explicitly before deciding whether there is anything to do.
        $CI->config->load('migration', FALSE, TRUE);

        if (!$CI->config->item('migration_enabled')) {
            return;
        }

        $target = (int) $CI->config->item('migration_version');

        $CI->load->database();
        $marker = $this->marker_path();

        if ($marker !== NULL && is_file($marker) && (int) @file_get_contents($marker) === $target) {
            return;
        }

        // A schema problem must never take the whole app down: log it and let the
        // request continue, so the site stays up while the issue is looked at.
        try {
            $this->baseline($CI, $target);

            $CI->load->library('migration');
            if ($CI->migration->current() === FALSE) {
                log_message('error', 'Schema_guard: migration failed - ' . $CI->migration->error_string());
                return;
            }
        } catch (Exception $e) {
            log_message('error', 'Schema_guard: ' . $e->getMessage());
            return;
        } catch (Error $e) {
            log_message('error', 'Schema_guard: ' . $e->getMessage());
            return;
        }

        if ($marker !== NULL) {
            @file_put_contents($marker, $target, LOCK_EX);
        }
    }

    /**
     * Where to remember the applied version. application/cache is not writable
     * by the web server on every host, so fall back to the system temp dir.
     * Without a marker the hook still works, it just re-checks each request.
     *
     * @return string|null
     */
    private function marker_path()
    {
        $CI =& get_instance();
        $db = isset($CI->db) ? (string) $CI->db->database : '';
        $name = 'schema_version_' . md5(APPPATH . '|' . $db);

        foreach (array(APPPATH . 'cache/', rtrim(sys_get_temp_dir(), '/\\') . '/') as $dir) {
            if (is_dir($dir) && is_writable($dir)) {
                return $dir . $name;
            }
        }

        return NULL;
    }

    /**
     * Installs that predate this hook already have 001/002 applied by hand while
     * the migrations table still reads 0. Running them again would try to create
     * tables that exist, so record what is already in place first.
     *
     */
    private function baseline($CI, $target)
    {
        if (!$CI->db->table_exists('migrations')) {
            $CI->db->query('CREATE TABLE IF NOT EXISTS `migrations` (`version` BIGINT(20) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8');
        }

        $row = $CI->db->get('migrations')->row();
        if ($row === NULL) {
            $CI->db->insert('migrations', array('version' => 0));
            $current = 0;
        } else {
            $current = (int) $row->version;
        }

        if ($current >= $target) {
            return;
        }

        // Highest migration whose result is already present in the schema.
        $applied = 0;
        if ($CI->db->table_exists('clinics')) {
            $applied = 1;
            if ($CI->db->table_exists('specialties')) {
                $applied = 2;
            }
        }

        if ($applied > $current) {
            $CI->db->update('migrations', array('version' => $applied));
        }
    }
}
