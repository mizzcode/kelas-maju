<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasUuids;

    protected $table = "mahasiswas";

    protected $fillable = ["name", "nim", "jurusan", "status", "user_id"];

    public function uniqueIds()
    {
        return [$this->primaryKey, "user_id"];
    }
}
