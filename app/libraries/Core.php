<?php
// Core app class
class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $nextMethod = '';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();
        // Look in controllers for first value, ucwords will capitalize first letter
        if (isset($url[0])) {
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                // Wil set a new controller
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
            }
        }
        // Require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;
        // Check for the 2nd part of the url
        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }
        // Check for the 3rd part of the url
        if (isset($url[2])) {
            if (method_exists($this->currentController, $url[2])) {
                $this->currentMethod = $url[2];
                unset($url[2]);
            }
        }

        // Get parameters
        $this->params = $url ? array_values($url) : [];
        // Call a callback with a array of params
        // print_r( $this->currentController);
        // print_r( $this->currentMethod);
        // print_r( $this->params);


        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    
    }
    /**
     * Get the url
     * @return string[]
     */
    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            // Allow you to filter variables as string
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Breaking into an array
            $url = explode('/', $url);
            return $url;
        }
    }
}
