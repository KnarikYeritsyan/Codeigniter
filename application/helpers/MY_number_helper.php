<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function roundhelp($number)
{
    return round($number);
}

function roundup($number)
{
    return ceil($number);
}

function rounddown($number)
{
    return floor($number);
}

function wholenumber($number)
{
    return str_replace('.',',',$number);
}