<?php

function route_class()
{
    return str_replace('.','-',Route::currentRouteName());
}

function getUserSignId()
{
    return DB::table('user_signs')->where('user_id', Auth::user()->id)->value('id');
}