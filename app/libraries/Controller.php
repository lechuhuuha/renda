<?php
// Load the model and view
class Controller
{
    /**
     * Require model file
     * @param string $model
     * @return new $model()
     */
    public function model($model)
    {
        // Require model file
        require_once '../app/models/' . $model . '.php';
        // Instanitate model
        return new $model();
    }
    /**
     * Load the view check for the file
     * @param string $view 
     * @param string[] $data
     */
    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die('View does not exist');
        }
    }
}
