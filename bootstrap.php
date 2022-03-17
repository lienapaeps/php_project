<?php

// this function loads all our classes automatically when needed

spl_autoload_register(function ($class) {
    include_once(__DIR__ . '/classes/' . $class . '.php');
});
