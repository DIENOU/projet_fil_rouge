<?php

namespace App\Repositories;

use App\Models\Produit;
use App\Repositories\BaseRepository;

/**
 * Class ProduitRepository
 * @package App\Repositories
 * @version September 3, 2022, 6:22 pm UTC
*/

class ProduitRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code_produit',
        'designation',
        'quantite',
        'prix_unitaire',
        'quantite_livraison',
        'unite_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Produit::class;
    }
}
