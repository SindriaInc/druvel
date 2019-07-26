<?php
/**
 * @file
 * nodes.php
 *
 * Nodes configuration
 *
 * @code
 *
 * return [
 *     '<machine-name>' => array(
 *           'name' => t('Sindria'),
 *           'base' => 'sindria',
 *           'description' => t('You can define new Sindria here'),
 *           'has_title' => TRUE,
 *           'title_label' => t('Sindria title')
 *     )
 * ];
 *
 * @endcode
 */


return [
    'sindria' => array(
        'name' => t('Sindria'),
        'base' => 'sindria',
        'description' => t('You can define new Sindria here'),
        'has_title' => TRUE,
        'title_label' => t('Sindria title')
    )
];