<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

/**
 * Class Unite
 * @package App\Models
 * @version September 3, 2022, 6:20 pm UTC
 *
 * @property string $nom
 * @property integer $unite_de_base_id
 * @property number $unite_de_base_quantite
 * @property integer $cree_par
 * @property integer $modifie_par
 */
class Unite extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'unites';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'unite_de_base_id',
        'unite_de_base_quantite',
        'cree_par',
        'modifie_par'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nom' => 'string',
        'unite_de_base_id' => 'integer',
        'unite_de_base_quantite' => 'decimal:2',
        'cree_par' => 'integer',
        'modifie_par' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required|max:200',
        'unite_de_base_id' => 'nullable',
        'unite_de_base_quantite' => 'nullable',
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
