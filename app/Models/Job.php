<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */

class Job extends Model {
    protected $table = 'job_listings';

    // protected $fillable = ['title', 'salary'];
    // Permite que todos os campos sejam 'fillable'. Na vdd ele vai dizer o 
    // que precisa ser protegido e o resto não
    protected $guarded = [];

    use HasFactory;
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'job_listing_id');
    }
}