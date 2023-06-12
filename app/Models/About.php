<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about';
    // Adicione os campos da tabela
    protected $fillable = ['name', 'description', 'isSelected'];
    // Ou, se preferir, use o seguinte código para permitir todos os campos em massa
    // protected $guarded = [];
}
