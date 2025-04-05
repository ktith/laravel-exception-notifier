<?php

if (!function_exists('awesome_welcome')) {
    function awesome_welcome($name = 'Guest') {
        return "Welcome to the Awesome Package, {$name}!";
    }
}
