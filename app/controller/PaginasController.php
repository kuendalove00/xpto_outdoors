<?php

class PaginasController
{
    public function redirect($location) {
        header('Location: ' . $location);
    }

    public function requestsHandler() {

        $filterPag = filter_input(INPUT_GET, 'pag');
        $pag = isset($filterPag) ? $filterPag : NULL;

        try {
            if (!$pag) {
                include 'view/inicio.php';
            } else if ($pag == 'servicos') {
                include 'view/servicos.php';
            }else if ($pag == 'outdoors') {
                include 'view/outdoors.php';
            } else if ($pag == 'contactos') {
                include 'view/contactos.php';
            } else if ($pag == 'login') {
                include 'view/login.php';
            }
        }catch (Exception $e) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }
}