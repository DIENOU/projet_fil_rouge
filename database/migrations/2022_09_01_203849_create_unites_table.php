<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unites', function (Blueprint $table) {
            $table->id('id');
            $table->string('nom', 200);
            $table->biginteger('unite_de_base_id')->unsigned()->nullable();
            $table->decimal('unite_de_base_quantite', 15, 2)->nullable()->default(0.00);
            $table->biginteger('cree_par')->unsigned()->nullable();
            $table->biginteger('modifie_par')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('unite_de_base_id')->references('id')->on('unites');
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
        Schema::drop('unites');
    }
}
