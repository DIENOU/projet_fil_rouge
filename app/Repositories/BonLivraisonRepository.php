<?php

namespace App\Repositories;

use App\Models\BonLivraison;
use App\Repositories\BaseRepository;

/**
 * Class BonLivraisonRepository
 * @package App\Repositories
 * @version September 3, 2022, 6:33 pm UTC
*/

class BonLivraisonRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'numero_bon_livraison',
        'etat',
        'projet',
        'client_id'
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
        return BonLivraison::class;
    }
}
