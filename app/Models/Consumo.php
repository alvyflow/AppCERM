<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuario_id',
        'fecha',
        'hora',
        'consumo'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'fecha' => 'date',
        'hora' => 'datetime',
        'consumo' => 'decimal:4'
    ];

    /**
     * Get the user that owns the consumption.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
