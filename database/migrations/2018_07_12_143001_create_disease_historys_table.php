<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiseaseHistorysTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'disease_historys';

    /**
     * Run the migrations.
     * @table disease_historys
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idDisease_history');
            $table->string('disease_name', 60);
            $table->string('analyzes', 100);
            $table->integer('directorys_idDirectory');
            $table->integer('medical_cards_idMedical_card');
            $table->integer('doctors_idDoctor');
            $table->timestamps();

            $table->unique(["idDisease_history"], 'idDisease_history_UNIQUE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->set_schema_table);
    }
}
