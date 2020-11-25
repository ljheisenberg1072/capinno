<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

function route_class()
{
    return str_replace('.','-',Route::currentRouteName());
}
