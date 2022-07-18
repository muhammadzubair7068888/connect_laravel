<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    use ImageTrait {
        deleteImage as traitDeleteImage;
    }
    protected $table = "files";

    static $PATH = 'user-files';

    public function getFileAttribute($value)
    {
        if (!empty($value))
            return $this->imageUrl(self::$PATH . DIRECTORY_SEPARATOR . $value);
        return asset('assets/chat/icons/male.png');
    }
}
