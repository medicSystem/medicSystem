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
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idDoctor');
            $table->string('patent', 100);
            $table->integer('experience');
            $table->string('work_time', 20);
            $table->integer('users_idUsers');
            $table->integer('doctors_type_idDoctor_type');
            $table->timestamps();

            $table->unique(["idDoctor"], 'idDoctor_UNIQUE');
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
