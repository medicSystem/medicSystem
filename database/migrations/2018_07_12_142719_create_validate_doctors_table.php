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
            $table->increments('idValidate_doctor');
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
            $table->integer('doctor_types_idDoctor_type');
            $table->timestamps();

            $table->unique(["idValidate_doctor"], 'idValidate_doctor_UNIQUE');
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
