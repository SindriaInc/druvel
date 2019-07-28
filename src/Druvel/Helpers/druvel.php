<?php
/**
 * @file
 * druvel.php
 *
 * Druvel Helpers File
 *
 * @package druvel
 * @author Luca Pitzoi <luca.pitzoi@sindria.org>
 * @version 0.1.0
 *
 */


if (!function_exists('druvel_entity_field')) {
    /**
     * Get entity field
     *
     * @param $entity_field array
     */
    function druvel_entity_field($entity_field, $field) {
        foreach ($entity_field as $key => $value) {
            $value = $value[0];
        }
        return $value[$field];
    }
}


if (!function_exists('druvel_entity_collection')) {
    /**
     * Get entity collection
     *
     * @param $entity_field array
     */
    function druvel_entity_collection($entity_field, $field) {

        $fields = array();

        foreach ($entity_field as $key => $value) {
            foreach ($value as $k => $v) {
                $fields[$k] = $v[$field];
            }
        }
        return $fields;
    }
}


if (!function_exists('druvel_render_field')) {
    /**
     * Render field using entity_type and entity
     *
     * @code
     *
     * render_field('node', $node, 'field_title');
     *
     * @endcode
     *
     * @param $entity_type
     * @param $entity
     * @param $field
     * @return string
     */
    function druvel_render_field($entity_type, $entity, $field) {

        // Must load field content for entity before using field_view_value()
        $fields = field_get_items($entity_type, $entity, $field);

        // $index corresponds to the value you want to render. First value = 0.
        $index = 0;
        $output = field_view_value($entity_type, $entity, $field, $fields[$index]);

        return render($output);
    }
}


if (!function_exists('druvel_gen_url')) {
    /**
     * Generate url
     *
     * @param $entity_field
     * @return bool|string
     */
    function druvel_gen_url($entity_field) {
        return file_create_url(entity_field($entity_field, 'uri'));
    }
}


if (!function_exists('druvel_gen_collection')) {
    /**
     * Generate collection data from drupal field collection
     *
     * @deprecated
     * @param $field_collection
     * @return array
     */
    function druvel_gen_collection($field_collection) {

        $results = array();
        $collection = array();

        $ids = entity_collection($field_collection, 'value');


        foreach ($ids as $key => $id) {
            $results[$key] = entity_load('field_collection_item', array($id));
        }

        foreach (json_decode(json_encode($results), true) as $value) {
            $element = array_shift($value);
            array_push($collection, $element);
        }
        return $collection;
    }
}


if (!function_exists('druvel_gen_collection_optimize')) {
    /**
     * Generate collection data from drupal field collection
     *
     * @param $field_collection
     * @return array
     */
    function druvel_gen_collection_optimize($field_collection) {

        $results = array();
        $collection = array();

        $ids = entity_collection($field_collection, 'value');

        foreach ($ids as $key => $id) {
            $results[$key] = entity_load('field_collection_item', array($id));
            $result = json_decode(json_encode($results[$key]), true);
            array_push($collection, $result[$id]);
        }
        return $collection;
    }
}


if (!function_exists('druvel_gen_target_attribute')) {
    /**
     * Generate target attribute
     *
     * @param $target
     * @return string
     */
    function druvel_gen_target_attribute($target) {
        $target_attribute = 'target=' . '"' . $target . '"';

        if ($target !== '_blank') {
            $target_attribute = '';
        }
        return $target_attribute;
    }
}


if (!function_exists('druvel_node_alias')) {
    /**
     * Get node alias from node->id
     *
     * @param $node_id
     * @return string
     */
    function druvel_node_alias($node_id) {
        return url('node/' . $node_id, array('absolute' => TRUE));
    }
}


if (!function_exists('druvel_node_path')) {
    /**
     * Get node local path from node alias
     *
     * @param $node_alias
     * @return string
     */
    function druvel_node_path($node_alias) {
        return drupal_get_normal_path($node_alias);
    }
}


if (!function_exists('druvel_node_id')) {
    /**
     * Get node->id from node alias
     *
     * @param $node_alias
     * @return string
     */
    function druvel_node_id($node_alias) {
        return substr(druvel_node_path($node_alias), strlen('/node'));
    }
}


