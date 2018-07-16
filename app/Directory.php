<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    protected $table = 'directories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'disease_name', 'category', 'subcategory', 'treatment', 'symptoms', 'picture',
    ];

    public function diseaseHistory(){
        return $this->hasMany('App\Disease_history', 'directories_id', 'id');
    }
}
