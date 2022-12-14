<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Inventaire
 * @package App\Models
 * @version September 3, 2022, 7:00 pm UTC
 *
 * @property string $intitule
 * @property integer $cree_par
 * @property integer $modifie_par
 */
class Inventaire extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'inventaires';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'intitule',
        'cree_par',
        'modifie_par'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'intitule' => 'string',
        'cree_par' => 'integer',
        'modifie_par' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'intitule' => 'required|max:250',
        'cree_par' => 'nullable',
        'modifie_par' => 'nullable'
    ];

    public function creepar() {
        return $this->belongsTo(User::class, 'cree_par', 'id');
    }

    public function modifiePar() {
        return $this->belongsTo(User::class, 'modifie_par', 'id');
    }
    
}


