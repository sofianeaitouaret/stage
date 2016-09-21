<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conges', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->integer('duree');

            $table->integer('salarie_id')->unsigned();
            $table->foreign('salarie_id')
                ->references('id')
                ->on('salaries')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conges', function(Blueprint $table) {
            $table->dropForeign('conges_salarie_id_foreign');
        });
        Schema::drop('conges');
    }
}