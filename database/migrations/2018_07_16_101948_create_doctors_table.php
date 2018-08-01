<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'doctors';

    /**
     * Run the migrations.
     * @table doctors
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('patent', 100);
            $table->integer('experience');
            $table->string('work_time', 20);
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('doctor_types_id');
            $table->timestamps();
            $table->foreign('users_id')->references('id')-> on('users')->onDelete('cascade');
            //DB::unprepared('ALTER TABLE `doctors` ADD FOREIGN KEY ( `doctor_types_id`) REFERENCES `doctor_types`(`id`)');
            $table->foreign('doctor_types_id')->references('id')-> on('doctor_types')->onDelete('cascade');
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
