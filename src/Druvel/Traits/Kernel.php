<?php
/**
 * Trait Druvel_Traits_Kernel
 *
 * @package druvel
 * @author Luca Pitzoi <luca.pitzoi@sindria.org>
 * @version 0.1.0
 */


trait Druvel_Traits_Kernel
{

    /**
     * Get request uri
     *
     * @return bool|string
     */
    public function uri () {
        return $this->cleanUri($_SERVER['REQUEST_URI']);
    }


    /**
     * Clean request uri
     *
     * @param $uri
     * @return bool|string
     */
    public function cleanUri ($uri) {

        if (strpos($uri, 'en/') !== false) {
            $uri = substr($uri, strlen('en/'));
        }

        if (strpos($uri, 'it/') !== false) {
            $uri = substr($uri, strlen('it/'));
        }

        return $uri;
    }

}