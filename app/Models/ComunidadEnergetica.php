<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComunidadEnergetica extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comunidades_energeticas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'direccion'
    ];

    /**
     * Get the users that belong to the community.
     */
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'comunidades_energetica_id');
    }
}
