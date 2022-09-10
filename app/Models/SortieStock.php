<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SortieStock
 * @package App\Models
 * @version September 3, 2022, 6:35 pm UTC
 *
 * @property integer $bon_livraison_id
 * @property integer $produit_id
 * @property number $quantite
 * @property number $prix_unitaire
 * @property number $quantite_livree
 * @property integer $cree_par
 * @property integer $modifie_par
 */
class SortieStock extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'sortie_stocks';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'bon_livraison_id',
        'produit_id',
        'quantite',
        'prix_unitaire',
        'quantite_livree',
        'cree_par',
        'modifie_par'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'bon_livraison_id' => 'integer',
        'produit_id' => 'integer',
        'quantite' => 'decimal:2',
        'prix_unitaire' => 'decimal:2',
        'quantite_livree' => 'decimal:2',
        'cree_par' => 'integer',
        'modifie_par' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'bon_livraison_id' => 'required',
        'produit_id' => 'required',
        'quantite' => 'required',
        'prix_unitaire' => 'required',
        'quantite_livree' => 'required',
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
