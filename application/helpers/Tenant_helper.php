<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Tenant Helper
 * 
 * Provides multi-tenant functionality for clinic isolation
 */

if (!function_exists('current_clinic_id')) {
    /**
     * Get current user's clinic ID from session
     * 
     * @return int|null
     */
    function current_clinic_id() {
        $CI =& get_instance();
        return $CI->session->userdata('clinic_id');
    }
}

if (!function_exists('is_superadmin')) {
    /**
     * Check if current user is superadmin
     * 
     * @return bool
     */
    function is_superadmin() {
        $CI =& get_instance();
        return (bool) $CI->session->userdata('is_superadmin');
    }
}

if (!function_exists('apply_clinic_filter')) {
    /**
     * Apply clinic filter to a query
     * Automatically bypasses filter for superadmins if requested
     * 
     * @param string $table_alias Table alias (optional)
     * @param bool $bypass_for_superadmin Whether to skip filter for superadmins
     * @return CI_DB_query_builder
     */
    function apply_clinic_filter($table_alias = '', $bypass_for_superadmin = false) {
        $CI =& get_instance();
        
        // Superadmins can see all clinics if bypass is enabled
        if ($bypass_for_superadmin && is_superadmin()) {
            return $CI->db;
        }
        
        $clinic_id = current_clinic_id();
        $column = $table_alias ? $table_alias . '.clinic_id' : 'clinic_id';
        
        if ($clinic_id) {
            $CI->db->where($column, $clinic_id);
        }
        
        return $CI->db;
    }
}

if (!function_exists('add_clinic_data')) {
    /**
     * Add clinic_id to data array before insert
     * 
     * @param array $data Data array
     * @return array
     */
    function add_clinic_data($data) {
        $clinic_id = current_clinic_id();
        if ($clinic_id && !isset($data['clinic_id'])) {
            $data['clinic_id'] = $clinic_id;
        }
        return $data;
    }
}

if (!function_exists('get_clinics')) {
    /**
     * Get all clinics (for superadmin)
     * 
     * @return array
     */
    function get_clinics() {
        $CI =& get_instance();
        $CI->load->database();
        $query = $CI->db->get('clinics');
        return $query->result();
    }
}

if (!function_exists('get_current_clinic')) {
    /**
     * Get current clinic details
     * 
     * @return object|null
     */
    function get_current_clinic() {
        $CI =& get_instance();
        $clinic_id = current_clinic_id();
        
        if (!$clinic_id) {
            return null;
        }
        
        $CI->load->database();
        $query = $CI->db->get_where('clinics', array('id' => $clinic_id));
        return $query->row();
    }
}

if (!function_exists('can_access_clinic')) {
    /**
     * Check if current user can access specific clinic
     * 
     * @param int $clinic_id
     * @return bool
     */
    function can_access_clinic($clinic_id) {
        if (is_superadmin()) {
            return true;
        }
        return current_clinic_id() == $clinic_id;
    }
}

if (!function_exists('redirect_if_no_clinic')) {
    /**
     * Redirect user if they don't have clinic assigned
     */
    function redirect_if_no_clinic() {
        $CI =& get_instance();
        
        if (!current_clinic_id() && !is_superadmin()) {
            $CI->session->set_flashdata('error', 'You are not assigned to any clinic. Please contact administrator.');
            redirect('Pages/log_in');
        }
    }
}

if (!function_exists('require_superadmin')) {
    /**
     * Check if superadmin access is required
     * Redirect if not superadmin
     */
    function require_superadmin() {
        if (!is_superadmin()) {
            $CI =& get_instance();
            $CI->session->set_flashdata('error', 'Access denied. Superadmin privileges required.');
            redirect(base_url());
        }
    }
}

if (!function_exists('clinic_name')) {
    /**
     * Get current clinic name
     * 
     * @return string
     */
    function clinic_name() {
        $clinic = get_current_clinic();
        return $clinic ? $clinic->name : 'Unknown Clinic';
    }
}

if (!function_exists('table_has_clinic_id')) {
    /**
     * Check if table has clinic_id column
     * 
     * @param string $table
     * @return bool
     */
    function table_has_clinic_id($table) {
        static $checked = [];
        
        if (isset($checked[$table])) {
            return $checked[$table];
        }
        
        $CI =& get_instance();
        $CI->load->database();
        
        // Check if column exists
        $query = $CI->db->query("SHOW COLUMNS FROM `$table` LIKE 'clinic_id'");
        $checked[$table] = ($query->num_rows() > 0);
        
        return $checked[$table];
    }
}
