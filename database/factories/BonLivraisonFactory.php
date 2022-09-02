<?php

namespace Database\Factories;

use App\Models\BonLivraison;
use Illuminate\Database\Eloquent\Factories\Factory;

class BonLivraisonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BonLivraison::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numero_bon_livraison' => $this->faker->word,
        'client_id' => $this->faker->word,
        'etat' => $this->faker->word,
        'projet' => $this->faker->word,
        'cree_par' => $this->faker->word,
        'modifie_par' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
