<?php
    namespace Controller\Admin\Pizza;

    use Controller\GenericController;
    use CoffeeCode\Router\Router;
    use League\Plates\Engine;

    class PagesController extends GenericController
    {
        function __construct(?Router $router = null)
        {
            parent::__construct($router, "");
        }

        public function viewPizzaHome () : void
        {
            echo "<p>HelloWorld</p>";
        }
    }