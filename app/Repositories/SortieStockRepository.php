<?php

namespace App\Repositories;

use App\Models\SortieStock;
use App\Repositories\BaseRepository;

/**
 * Class SortieStockRepository
 * @package App\Repositories
 * @version September 3, 2022, 6:35 pm UTC
*/

class SortieStockRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bon_livraison_id',
        'quantite',
        'prix_unitaire',
        'quantite_livree'
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
        return SortieStock::class;
    }
}
