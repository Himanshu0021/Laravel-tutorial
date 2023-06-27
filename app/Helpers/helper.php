<?php

if(!function_exists('precode')) {
    function precode($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}
