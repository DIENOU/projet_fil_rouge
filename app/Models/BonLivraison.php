<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\CreeParFactory;
use Illuminate\Database\Eloquent\Factories\ModifieParFactory;
/**
 * Class BonLivraison
 * @package App\Models
 * @version September 3, 2022, 6:33 pm UTC
 *
 * @property string $numero_bon_livraison
 * @property integer $client_id
 * @property string $etat
 * @property string $projet
 * @property integer $cree_par
 * @property integer $modifie_par
 */
class BonLivraison extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bon_livraisons';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'numero_bon_livraison',
        'client_id',
        'etat',
        'projet',
        'cree_par',
        'modifie_par'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'numero_bon_livraison' => 'string',
        'client_id' => 'integer',
        'etat' => 'string',
        'projet' => 'string',
        'cree_par' => 'integer',
        'modifie_par' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'numero_bon_livraison' => 'required|max:25',
        'client_id' => 'required',
        'etat' => 'required|max:25',
        'projet' => 'required|max:250',
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
