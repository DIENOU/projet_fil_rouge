<?php

namespace App\Repositories;

use App\Models\Fournisseur;
use App\Repositories\BaseRepository;

/**
 * Class FournisseurRepository
 * @package App\Repositories
 * @version September 3, 2022, 6:54 pm UTC
*/

class FournisseurRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'telephone',
        'email',
        'entreprise'
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
        return Fournisseur::class;
    }
}
