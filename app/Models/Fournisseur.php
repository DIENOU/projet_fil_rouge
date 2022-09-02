<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Fournisseur
 * @package App\Models
 * @version September 1, 2022, 8:37 pm UTC
 *
 * @property string $nom
 * @property string $telephone
 * @property string $email
 * @property string $entreprise
 * @property integer $cree_par
 * @property integer $modifie_par
 */
class Fournisseur extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'fournisseurs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'telephone',
        'email',
        'entreprise',
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
        'telephone' => 'string',
        'email' => 'string',
        'entreprise' => 'string',
        'cree_par' => 'integer',
        'modifie_par' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required|max:150',
        'telephone' => 'required|max:20',
        'email' => 'nullable|max:100|unique:fournisseurs',
        'entreprise' => 'nullable|max:250',
        'cree_par' => 'nullable',
        'modifie_par' => 'nullable'
    ];

    
}
