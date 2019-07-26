<?php

/**
 * Class Druvel_Utility_Config
 *
 * @package druvel
 * @author Luca Pitzoi <luca.pitzoi@sindria.org>
 * @version 0.1.0
 */
class Druvel_Utility_Config
{

    /**
     * Get all nodes info
     *
     * @return mixed
     */
    public static function configNodes() {
        return include dirname(__FILE__). '/../../../config/nodes.php';
    }

}