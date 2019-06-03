<?php
use Ethereal\Foundation\Application;

// dependencies functions

if (!function_exists('app')) {
    function app()
    {
        return Application::getStaticInstance();
    }
}