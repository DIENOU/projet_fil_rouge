<?php

namespace App\Repositories;

use App\Models\InventaireLigne;
use App\Repositories\BaseRepository;

/**
 * Class InventaireLigneRepository
 * @package App\Repositories
 * @version September 3, 2022, 6:26 pm UTC
*/

class InventaireLigneRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'inventaire_id',
        'quantite_restant',
        'quantite_inventaire'
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
        return InventaireLigne::class;
    }
}
