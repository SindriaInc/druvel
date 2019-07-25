<?php

/**
 * Class Mediahub_Models_HeaderStories Model
 *
 * @package prysmiangroup.com
 * @author Luca Pitzoi <luca.pitzoi@softecspa.it>
 * @version 0.1.0
 */
class Mediahub_Models_HeaderStories extends Mediahub_Models_Model
{


  /**
   * @var
   */
  public $image;


  /**
   * @var
   */
  public $alt;


  /**
   * @var
   */
  public $label;


  /**
   * @var
   */
  public $editorial;


  /**
   * @var
   */
  public $title;


  /**
   * @var
   */
  public $subtitle;


  /**
   * Mediahub_Models_HeaderStories constructor.
   * @param $img
   * @param $alt
   * @param $label
   * @param $editorial
   * @param $title
   * @param $subtitle
   */
  public function __construct($img, $alt, $label, $editorial, $title, $subtitle)
  {

    $this->image = $img;
    $this->alt = $alt;
    $this->label = $label;
    $this->editorial = $editorial;
    $this->title = $title;
    $this->subtitle = $subtitle;

  }

}
