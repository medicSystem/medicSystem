<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValidateDoctorsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'validate_doctors';

    /**
     * Run the migrations.
     * @table validate_doctors
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email', 60);
            $table->string('password', 12);
            $table->string('type', 10);
            $table->date('birthday');
            $table->integer('phone_number');
            $table->string('avatar', 100);
            $table->string('patent', 100);
            $table->integer('experience');
            $table->date('send_date');
            $table->string('status', 10);
            $table->string('doctor_type', 60);
            $table->unsignedInteger('doctor_types_id');
            $table->timestamps();
            $table->foreign('doctor_types_id')->references('id')-> on('doctor_types');
            //DB::unprepared('ALTER TABLE `validate_doctors` ADD FOREIGN KEY ( `doctor_types_id`) REFERENCES `doctor_types`(`id`)');
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
