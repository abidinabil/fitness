<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('commandes')){


        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->integer('id_produits');
            
            $table->integer('id_user');
            $table->string('name');
            $table->string('adresse');
            $table->integer('Ntlfn');
            $table->integer('CodePostal');
         
            
            $table->string('qty')->nullable();
            $table->string('Total')->nullable();
            $table->timestamps();
        });
    }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
