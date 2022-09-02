<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventaireLignesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaire_lignes', function (Blueprint $table) {
            $table->id('id');
            $table->biginteger('produit_id')->unsigned();
            $table->biginteger('inventaire_id')->unsigned();
            $table->decimal('quantite_restant', 15, 2)->default(0.00);
            $table->decimal('quantite_inventaire', 15, 2)->default(0.00)->nullable();
            $table->biginteger('cree_par')->unsigned()->nullable();
            $table->biginteger('modifie_par')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('produit_id')->references('id')->on('produits');
            $table->foreign('inventaire_id')->references('id')->on('inventaires');
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
        Schema::drop('inventaire_lignes');
    }
}
