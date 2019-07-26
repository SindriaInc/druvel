<?php

/**
 * Class Druvel_Http_Kernel
 *
 * @package druvel
 * @author Luca Pitzoi <luca.pitzoi@sindria.org>
 * @version 0.1.0
 */
class Druvel_Http_Kernel
{

    use Druvel_Traits_Kernel;


    /**
     * Instantiate new controller on the fly
     *
     * @var Druvel_Http_Controllers_Controller
     */
    private $controller;


    /**
     * Kernel constructor.
     */
    public function __construct() {
        //
    }

    /**
     * Available web and api routes
     *
     * @return array
     */
    public static function webRoutes () {
        return include dirname(__FILE__). '/../../../routes/web.php';
    }

    /**
     * Available routes by node type
     *
     * @return array
     */
    public static function typeRoutes () {
        return include dirname(__FILE__). '/../../../routes/type.php';
    }


    /**
     * Handle requests to search if a route exists, based on SERVER_URI.
     * Called automatically by drupal, through hook_menu().
     */
    public function webHandle() {
        $validRoutes = Druvel_Http_Kernel::webRoutes();

        // Search valid route for current request
        foreach ($validRoutes as $key => $value) {

            $validUri = '/' . $key;

            if ($validUri === $this->uri()) {
                $route = $value;
                break;
            }
        }

        $unused = array();
        $this->callControllerMethod($route, $unused);
    }


    /**
     * Handles the routing by node type.
     * Calls callControllerMethod().
     *
     * @param $vars - Drupal variables passed by reference
     * @see Kernel::callControllerMethod() to see how $vars is used
     */
    public function typeHandle (&$vars) {
        if (!isset($vars['node'])) {
            return;
        }

        $node = $vars['node'];

        $routes = self::typeRoutes();

        $this->callControllerMethod($routes[$node->type],$vars);
    }


    /**
     * Call the controller method as specified by $route
     *
     * @param $route - Array with 'controller', 'method' and optionally the 'arguments' array.
     * @param $vars - Drupal variables passed by reference, if not empty $vars['node'] will be passed to the controller
     * as its first argument
     *
     * $vars['collection'] will be updated with the return value of the controller
     */
    public function callControllerMethod($route, &$vars) {
        if (!isset($route)) {
            return;
        }

        $this->controller = new $route['controller'];

        if (isset($vars['node'])) {
            array_unshift($route['arguments'], $vars['node']);
        }

        $result = $this->controller->callAction($route['method'], $route['arguments']);
        $vars['collection'] = $result;
    }





}
