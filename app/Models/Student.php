<?php

namespace App\Models;

use App\Models\Scopes\StatusScope;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasUuids;

    protected $table = "students";

    protected $keyType = "string";
    
    public $incrementing = false;

    protected $fillable = ["email", "name", "nis", "jurusan", "status", "user_id"];

    public function user() : BelongsTo 
    {
        return $this->belongsTo(User::class);
    }
}
