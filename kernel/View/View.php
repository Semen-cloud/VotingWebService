<?php

namespace App\kernel\View;

class View {
    public function page(string $name) : void {
        $viewPath = APP_PATH . "/views/pages/$name.php";
        if(!file_exists($viewPath)) {
            echo "Page $name not found";
            return;
        }

        extract([
            'view' => $this
        ]);

        include_once $viewPath;
    }

    public function component(string $name) : void {
        $viewPath = APP_PATH . "/views/components/$name.php";
        if(!file_exists($viewPath)) {
            echo "Component $name not found";
            return;
        }

        include_once $viewPath;
    }
}