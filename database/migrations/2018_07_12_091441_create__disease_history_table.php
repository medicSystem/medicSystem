<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiseaseHistoryTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'Disease_history';

    /**
     * Run the migrations.
     * @table Disease_history
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
            $table->integer('Directory_idDirectory');
            $table->integer('Medical_card_idMedical_card');
            $table->integer('Doctor_idDoctor');
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
