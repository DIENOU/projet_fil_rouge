<?php

namespace App\Repositories;

use App\Models\Unite;
use App\Repositories\BaseRepository;

/**
 * Class UniteRepository
 * @package App\Repositories
 * @version September 3, 2022, 6:20 pm UTC
*/

class UniteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'unite_de_base_quantite'
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
        return Unite::class;
    }
}
