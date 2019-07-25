<?php

/**
 * Class Mediahub_Http_Controllers_MediahubController
 *
 * @package prysmiangroup.com
 * @author Luca Pitzoi <luca.pitzoi@softecspa.it>
 * @version 0.1.0
 */
class Mediahub_Http_Controllers_MediahubController extends Mediahub_Http_Controllers_Controller
{

    /**
     * Create HeaderStories widget generating array object data collection
     *
     * @param $node
     * @return object
     */
    public function widgetHeaderStories($node) {

      $collection = new stdClass();

      $panel = node_load(entity_field($node->field_panel_header_stories, 'value'));

      $collection->header = new Mediahub_Models_HeaderStories(
            getScaldImageURL($node->field_image_header_stories),
            entity_field($node->field_alt_header_stories, 'value'),
            entity_field($node->field_label_header_stories, 'value'),
            entity_field($node->field_editorial_header_stories, 'value'),
            entity_field($panel->field_panel_title, 'value'),
            entity_field($panel->field_panel_subtitle, 'value')
        );

      return $collection;
    }



}
