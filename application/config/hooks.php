<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/userguide3/general/hooks.html
|
*/

/*
| Apply pending database migrations on boot, so deploying new code never needs
| a manual ALTER on production. See application/hooks/Schema_guard.php.
*/
$hook['post_controller_constructor'] = array(
    'class'    => 'Schema_guard',
    'function' => 'run',
    'filename' => 'Schema_guard.php',
    'filepath' => 'hooks',
);
