<?php

namespace App\Repositories;

use App\Models\EntreeStock;
use App\Repositories\BaseRepository;

/**
 * Class EntreeStockRepository
 * @package App\Repositories
 * @version September 3, 2022, 6:30 pm UTC
*/

class EntreeStockRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fournisseur_id',
        'produit_id',
        'numero_lot',
        'quantite',
        'prix_unitaire'
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
        return EntreeStock::class;
    }
}
