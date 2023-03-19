<?php

if (! function_exists('show_erros')) {
    function show_erros($erros = null) {
        if (! is_null($erros)) {
            foreach ($erros as $erro) {
                echo show_alert($erro);
            }
        }
    }
}

if (! function_exists('show_alert')) {
    function show_alert($texto, $tipo = 'danger') {
        $alert = <<< alert

        <div class="alert alert-$tipo alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            $texto
        </div>

        alert;

        return $alert;
    }
}

if (! function_exists('get_alert')) {
    function get_alert() {
        if (session()->has('sucesso')) {
            return show_alert(session('sucesso'), 'success');
        }

        if (session()->has('erro')) {
            return show_alert(session('erro'));
        }
    }
}