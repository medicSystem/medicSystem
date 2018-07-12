<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessangerTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'Messanger';

    /**
     * Run the migrations.
     * @table Messanger
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idMessanger');
            $table->integer('Doctor_idDoctor');
            $table->integer('Doctor_users_idUsers');
            $table->integer('Doctor_Doctor_type_idDoctor_type');
            $table->integer('Patient_idPatient');
            $table->integer('Patient_users_idUsers');
            $table->timestamps();

            $table->index(["Patient_idPatient", "Patient_users_idUsers"], 'fk_Messanger_Patient1_idx');

            $table->index(["Doctor_idDoctor", "Doctor_users_idUsers", "Doctor_Doctor_type_idDoctor_type"], 'fk_Messanger_Doctor1_idx');

            $table->unique(["idMessanger"], 'idMessanger_UNIQUE');


            $table->foreign('Doctor_idDoctor', 'fk_Messanger_Doctor1_idx')
                ->references('idDoctor')->on('Doctor')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Patient_idPatient', 'fk_Messanger_Patient1_idx')
                ->references('idPatient')->on('Patient')
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
