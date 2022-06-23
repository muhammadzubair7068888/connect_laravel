<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PluginAttributes extends Model
{
    use HasFactory;
    protected $table = "plugins_attributes";

    public function plugin()
    {
        return $this->belongsTo(Plugin::class);
    }
}
