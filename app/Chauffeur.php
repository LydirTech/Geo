<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'num_tel','creator_id','navette_id',
    ];

    /**
     * Chauffeur belongs to User model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Chauffeur belongs to Navette model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function navette()
    {
        return $this->belongsTo(User::class);
    }

    public function getNavetteName(int $var )
    {
        $nav= Navette::query()->find($var);
        return $nav->name;
    }

}
