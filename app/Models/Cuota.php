<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuario_id',
        'cuota',
        'pago_2023',
        'pago_2024',
        'pago_2025',
        'pago_2026',
        'pago_2027'
    ];
    
    public $timestamps = false;

    /**
     * Get the user that owns the fee.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
