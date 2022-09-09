<?php

namespace App\Repositories;

use App\Models\Inventaire;
use App\Repositories\BaseRepository;

/**
 * Class InventaireRepository
 * @package App\Repositories
 * @version September 3, 2022, 7:00 pm UTC
*/

class InventaireRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'intitule'
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
        return Inventaire::class;
    }
}
