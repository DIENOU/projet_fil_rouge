<?php

namespace Database\Factories;

use App\Models\InventaireLigne;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventaireLigneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InventaireLigne::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'produit_id' => $this->faker->word,
        'inventaire_id' => $this->faker->word,
        'quantite_restant' => $this->faker->word,
        'quantite_inventaire' => $this->faker->word,
        'cree_par' => $this->faker->word,
        'modifie_par' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
