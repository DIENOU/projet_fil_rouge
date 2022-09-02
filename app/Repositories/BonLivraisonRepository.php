<?php

namespace App\Repositories;

use App\Models\BonLivraison;
use App\Repositories\BaseRepository;

/**
 * Class BonLivraisonRepository
 * @package App\Repositories
 * @version September 1, 2022, 8:42 pm UTC
*/

class BonLivraisonRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'numero_bon_livraison',
        'etat',
        'projet'
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
