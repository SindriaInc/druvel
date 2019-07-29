<?php
/**
 * @file
 * type.php
 *
 * Content Type routes
 *
 * @code
 *
 * return [
 *     '<machine-name>' => array(
 *           'controller'          => '<controller-class>',
 *           'method'              => '<controller-method>',
 *           'arguments'           => array(),
 *     )
 * ];
 *
 * @endcode
 */


return [
    'sindria' => array(
              'controller'          => 'Druvel_Http_Controllers_DruvelController',
              'method'              => 'index',
              'arguments'           => array(),
    )
];
