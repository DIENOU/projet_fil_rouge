<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Produit
 * @package App\Models
 * @version September 1, 2022, 9:24 pm UTC
 *
 * @property string $code_produit
 * @property string $designation
 * @property number $quantite
 * @property number $prix_unitaire
 * @property number $quantite_livraison
 * @property integer $unite_id
 * @property integer $cree_par
 * @property integer $modifie_par
 */
class Produit extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'produits';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'code_produit',
        'designation',
        'quantite',
        'prix_unitaire',
        'quantite_livraison',
        'unite_id',
        'cree_par',
        'modifie_par'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'code_produit' => 'string',
        'designation' => 'string',
        'quantite' => 'decimal:2',
        'prix_unitaire' => 'decimal:2',
        'quantite_livraison' => 'decimal:2',
        'unite_id' => 'integer',
        'cree_par' => 'integer',
        'modifie_par' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code_produit' => 'required|max:50',
        'designation' => 'required|max:200',
        'quantite' => 'required',
        'prix_unitaire' => 'nullable',
        'quantite_livraison' => 'nullable',
        'unite_id' => 'required',
        'cree_par' => 'nullable',
        'modifie_par' => 'nullable'
    ];

    
}
