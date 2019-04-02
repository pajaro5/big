<?php


/** php function to generate random integer between two numbers **/
if (!function_exists('generateRandomIntegerBetween')) {
    function generateRandomIntegerBetween($min,$max)
    {
        return rand($min,$max);
    }
}