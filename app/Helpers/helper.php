<?php

use App\Models\Plugin;

if (!function_exists('plugin_val')) {
    function plugin_val($plugin, $name)
    {
        $p = Plugin::where('name', $plugin)->first();

        if ($p) {
            $pv = $p->pluginsattribute->where('name', $name)->first();
        } else {
            $pv = false;
        }

        if ($pv) {
            return $pv->value;
        } else {
            return false;
        }
    }
}
