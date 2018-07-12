<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalCardsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'medical_cards';

    /**
     * Run the migrations.
     * @table medical_cards
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idMedical_card');
            $table->string('postal_address', 60);
            $table->string('sex', 1);
            $table->text('chronic_disease');
            $table->text('allergy');
            $table->integer('patients_idPatient');
            $table->timestamps();

            $table->unique(["idMedical_card"], 'idMedical_card_UNIQUE');
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
