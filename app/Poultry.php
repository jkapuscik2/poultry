<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Poultry extends Model
{
    protected $table = "poultry";
    public $timestamps = false;

    public function photoUrl() {
        return Storage::disk('s3')->url($this->photo);
    }

    public function getAll() {
        return self::all();
    }
}
