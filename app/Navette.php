<?php

namespace App;

use App\User;
use App\Outlet;
use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navette extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'etabA_id', 'etabB_id','creator_id',
    ];

        /**
     * Outlet belongs to User model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function etabA()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function etabB()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function getEtabName(int $var)
    {
        $out= Outlet::query()->find($var);
        return $out->name;
    }

    public function getEtabLat(int $var)
    {
        $out= Outlet::query()->find($var);
        return $out->latitude;
    }

    public function getEtabLon(int $var)
    {
        $out= Outlet::query()->find($var);
        return $out->longitude;
    }

}
