<?php

/**
 * Class Druvel_Http_Controllers_Controller Abstract
 *
 * @package druvel
 * @author Luca Pitzoi <luca.pitzoi@sindria.org>
 * @version 0.1.0
 */
abstract class Druvel_Http_Controllers_Controller
{

    /**
     * Execute an action on the controller.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return Druvel_Http_Controllers_Controller
     */
    public function callAction($method, $parameters)
    {
        return call_user_func_array([$this, $method], $parameters);
    }


    /**
     * Handle calls to missing methods on the controller.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     *
     * @throws \BadMethodCallException
     */
    public function __call($method, $parameters)
    {
        throw new \BadMethodCallException(sprintf(
            'Method %s::%s does not exist.', static::class, $method
        ));
    }

}
