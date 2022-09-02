<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id('id');
            $table->string('code_produit', 50);
            $table->string('designation', 200);
            $table->decimal('quantite', 15, 2)->default(0.00);
            $table->decimal('prix_unitaire', 15, 2)->default(0.00);
            $table->decimal('quantite_livraison', 15, 2)->nullable()->default(0.00);
            $table->biginteger('unite_id')->unsigned();
            $table->biginteger('cree_par')->unsigned()->nullable();
            $table->biginteger('modifie_par')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('unite_id')->references('id')->on('unites');
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
        Schema::drop('produits');
    }
}
