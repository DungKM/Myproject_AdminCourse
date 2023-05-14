<?php

if (!function_exists('SuperAdmin')) {
    function SuperAdmin(): bool
    {
        return session()->get('level') == 1;
    }
}
