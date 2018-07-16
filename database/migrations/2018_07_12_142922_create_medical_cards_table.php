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
            $table->increments('id');
            $table->string('postal_address', 60);
            $table->string('sex', 1);
            $table->text('chronic_disease');
            $table->text('allergy');
            $table->unsignedInteger('patients_id');
            $table->timestamps();
            $table->foreign('patients_id')->references('id')-> on('patients');
            $table->unique(["patients_id"], 'patients_id_UNIQUE');
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
