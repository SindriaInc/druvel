<?php
/**
 * @file
 * debug.php
 *
 * Manual var_dumper Helpers file
 *
 * @author Luca Pitzoi <luca.pitzoi@sindria.org>
 * @version 0.1.0
 *
 */


if (!function_exists('dd')) {
    /**
     * Dump and Die debug function
     */
    function dd() {
        $args = func_get_args();
        echo '<pre>';
        call_user_func_array('var_dump', $args);
        echo '</pre>';
        die();
    }
}


if (!function_exists('d')) {
    /**
     * Dump debug function
     */
    function d() {
        $args = func_get_args();
        echo '<pre>';
        call_user_func_array('var_dump', $args);
        echo '</pre>';
    }
}