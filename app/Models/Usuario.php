<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'telefono',
        'direccion',
        'rol',
        'dni',
        'porcentaje_autoconsumo',
        'comunidades_energetica_id'
    ];
    public $timestamps = false; // 🔹 Desactiva los timestamps automáticos

    /**
     * Get the community that the user belongs to.
     */
    public function comunidadEnergetica()
    {
        return $this->belongsTo(ComunidadEnergetica::class, 'comunidades_energetica_id');
    }

    /**
     * Get the consumption records associated with the user.
     */
    public function consumos()
    {
        return $this->hasMany(Consumo::class);
    }
}
