
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('nameSalarie');
            $table->string('prenomSalarie');
            $table->integer('NSS');
            $table->date('dateNaissance');
            $table->string('lieuNaissance');
            $table->date('dateRecrutement');
            $table->boolean('etat')->default(true);
            $table->date('dateArret')->default('0000-01-01');


            $table->integer('grade_id')->unsigned();
            $table->foreign('grade_id')
                ->references('id')
                ->on('grades')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->integer('contract_id')->unsigned();
            $table->foreign('contract_id')
                ->references('id')
                ->on('contracts')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->integer('bureau_id')->unsigned();
            $table->foreign('bureau_id')
                ->references('id')
                ->on('bureaux')
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
        Schema::table('salaries', function(Blueprint $table) {
            $table->dropForeign('salaries_bureau_id_foreign');
            $table->dropForeign('salaries_contract_id_foreign');
            $table->dropForeign('salaries_grade_id_foreign');
        });
        Schema::drop('salaries');
    }
}
