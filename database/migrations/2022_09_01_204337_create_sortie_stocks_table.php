<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSortieStocksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sortie_stocks', function (Blueprint $table) {
            $table->id('id');
            $table->biginteger('bon_livraison_id')->unsigned();
            $table->biginteger('produit_id')->unsigned();
            $table->decimal('quantite', 15, 2)->default(0.00);
            $table->decimal('prix_unitaire', 15, 2)->default(0.00);
            $table->decimal('quantite_livree', 15, 2)->default(0.00);
            $table->biginteger('cree_par')->unsigned()->nullable();
            $table->biginteger('modifie_par')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('bon_livraison_id')->references('id')->on('bon_livraisons');
            $table->foreign('produit_id')->references('id')->on('produits');
            $table->foreign('cree_par')->references('id')->on('users');
            $table->foreign('modifie_par')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sortie_stocks');
    }
}
