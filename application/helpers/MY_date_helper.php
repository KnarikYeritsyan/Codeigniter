<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function datehelp($format)
{
    if ($format=='us')
    {
        $date = date("m-d-Y");
    }
    if ($format=='uk')
    {
        $date = date("d-m-Y");
    }

    return $date;
}

function timehelp($format)
{
    if ($format=='12')
    {
        return date("g:i a");
    }
    if ($format=='24')
    {
        return date("H:i");
    }

}