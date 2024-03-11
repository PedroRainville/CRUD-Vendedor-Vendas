<?php

namespace App\Models;
use App\Models\Venda;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;
    protected $table = 'vendedors';
    protected $fillable = ['nome', 'email'];

    public function venda()
    {
        return $this->hasMany(Venda::class, 'id_vendedor','id');
    }

}
