<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasUuids;

    protected $table = "teachers";

    protected $keyType = "string";

    protected $fillable = [
        "name",
        "nik",
        "education",
        "gender",
    ];

    public function mapels() {
        return $this->hasMany('App\Model\Mapel', "teacher_id");
    }
}
