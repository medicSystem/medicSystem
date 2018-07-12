<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    protected $table = 'directorуs';
    protected $primaryKey = 'idDirectory';
    protected $fillable = [
        'disease_name', 'category', 'subcategory', 'treatment', 'symptoms', 'picture',
    ];
}
