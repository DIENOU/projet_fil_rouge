<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class InventaireLigne
 * @package App\Models
 * @version September 3, 2022, 6:26 pm UTC
 *
 * @property integer $produit_id
 * @property integer $inventaire_id
 * @property number $quantite_restant
 * @property number $quantite_inventaire
 * @property integer $cree_par
 * @property integer $modifie_par
 */
class InventaireLigne extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'inventaire_lignes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'produit_id',
        'inventaire_id',
        'quantite_restant',
        'quantite_inventaire',
        'cree_par',
        'modifie_par'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'produit_id' => 'integer',
        'inventaire_id' => 'integer',
        'quantite_restant' => 'decimal:2',
        'quantite_inventaire' => 'decimal:2',
        'cree_par' => 'integer',
        'modifie_par' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'produit_id' => 'required',
        'inventaire_id' => 'required',
        'quantite_restant' => 'nullable',
        'quantite_inventaire' => 'nullable',
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
