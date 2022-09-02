<?php

namespace Database\Factories;

use App\Models\EntreeStock;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntreeStockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EntreeStock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fournisseur_id' => $this->faker->word,
        'produit_id' => $this->faker->word,
        'numero_lot' => $this->faker->word,
        'quantite' => $this->faker->word,
        'prix_unitaire' => $this->faker->word,
        'cree_par' => $this->faker->word,
        'modifie_par' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
