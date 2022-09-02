<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EntreeStock
 * @package App\Models
 * @version September 1, 2022, 8:41 pm UTC
 *
 * @property integer $fournisseur_id
 * @property integer $produit_id
 * @property string $numero_lot
 * @property number $quantite
 * @property number $prix_unitaire
 * @property integer $cree_par
 * @property integer $modifie_par
 */
class EntreeStock extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'entree_stocks';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'fournisseur_id',
        'produit_id',
        'numero_lot',
        'quantite',
        'prix_unitaire',
        'cree_par',
        'modifie_par'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fournisseur_id' => 'integer',
        'produit_id' => 'integer',
        'numero_lot' => 'string',
        'quantite' => 'decimal:2',
        'prix_unitaire' => 'decimal:2',
        'cree_par' => 'integer',
        'modifie_par' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fournisseur_id' => 'nullable',
        'produit_id' => 'required',
        'numero_lot' => 'required|max:200',
        'quantite' => 'required',
        'prix_unitaire' => 'required',
        'cree_par' => 'nullable',
        'modifie_par' => 'nullable'
    ];

    
}
