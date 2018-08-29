<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiseaseHistoriesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'disease_histories';

    /**
     * Run the migrations.
     * @table disease_histories
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('analyzes', 100);
            $table->unsignedInteger('directories_id');
            $table->unsignedInteger('medical_cards_id');
            $table->unsignedInteger('doctors_id');
            $table->timestamps();
            $table->foreign('medical_cards_id')->references('id')-> on('medical_cards')->onDelete('cascade');
            $table->foreign('doctors_id')->references('id')-> on('doctors')->onDelete('cascade');
            //DB::unprepared('ALTER TABLE `disease_histories` ADD FOREIGN KEY ( `doctors_id`) REFERENCES `doctors`(`id`)');
            $table->foreign('directories_id')->references('id')-> on('directories')->onDelete('cascade');
            //$table->unique(["id"], 'id_UNIQUE');
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
