<?php

namespace Database\Factories;

use App\Models\SortieStock;
use Illuminate\Database\Eloquent\Factories\Factory;

class SortieStockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SortieStock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bon_livraison_id' => $this->faker->word,
        'produit_id' => $this->faker->word,
        'quantite' => $this->faker->word,
        'prix_unitaire' => $this->faker->word,
        'quantite_livree' => $this->faker->word,
        'cree_par' => $this->faker->word,
        'modifie_par' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
