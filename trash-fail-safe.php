<?php
/**
 * Description: Require confirmation before deleting items from the Trash, or emptying the whole trash. Protects against accidental clicks.
 * Plugin Name: Trash Fail Safe
 * Plugin URI: https://www.mikehealy.com.au/plugins/wp-trash-fail-safe 
 * Version: 1.2.0
 * Author: Mike Healy
 * Author URI: https://www.mikehealy.com.au
 * Requires PHP: 5.3
 * Requires at least: 4.7
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */

defined( 'ABSPATH' ) || exit();

add_action('admin_enqueue_scripts', function() {
    $script_handle = 'trash-fail-safe';

    wp_register_script($script_handle, plugins_url('failsafe.js', __FILE__), null, '1.2.0', true);
    wp_enqueue_script($script_handle);
});
