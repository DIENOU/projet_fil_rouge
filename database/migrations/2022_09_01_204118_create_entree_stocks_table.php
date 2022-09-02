<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreeStocksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entree_stocks', function (Blueprint $table) {
            $table->id('id');
            $table->biginteger('fournisseur_id')->unsigned();
            $table->biginteger('produit_id')->unsigned();
            $table->string('numero_lot', 200)->nullable();
            $table->decimal('quantite', 15, 2)->default(0.00);
            $table->decimal('prix_unitaire', 15, 2)->nullable()->default(0.00);
            $table->biginteger('cree_par')->unsigned()->nullable();
            $table->biginteger('modifie_par')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs');
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
        Schema::drop('entree_stocks');
    }
}
