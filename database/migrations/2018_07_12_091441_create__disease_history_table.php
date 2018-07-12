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
            $table->integer('Doctor_users_idUsers');
            $table->integer('Doctor_Doctor_type_idDoctor_type');
            $table->timestamps();

            $table->index(["Directory_idDirectory"], 'fk_Disease_history_Directory1_idx');

            $table->index(["Doctor_idDoctor", "Doctor_users_idUsers", "Doctor_Doctor_type_idDoctor_type"], 'fk_Disease_history_Doctor1_idx');

            $table->index(["Medical_card_idMedical_card"], 'fk_Disease_history_Medical_card1_idx');

            $table->unique(["idDisease_history"], 'idDisease_history_UNIQUE');


            $table->foreign('Directory_idDirectory', 'fk_Disease_history_Directory1_idx')
                ->references('idDirectory')->on('Directory')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Medical_card_idMedical_card', 'fk_Disease_history_Medical_card1_idx')
                ->references('idMedical_card')->on('Medical_card')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Doctor_idDoctor', 'fk_Disease_history_Doctor1_idx')
                ->references('idDoctor')->on('Doctor')
                ->onDelete('no action')
                ->onUpdate('no action');
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
