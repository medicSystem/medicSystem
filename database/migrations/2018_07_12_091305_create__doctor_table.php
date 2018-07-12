<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'Doctor';

    /**
     * Run the migrations.
     * @table Doctor
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
            $table->integer('Doctor_type_idDoctor_type');
            $table->timestamps();

            $table->index(["users_idUsers"], 'fk_Doctor_users_idx');

            $table->index(["Doctor_type_idDoctor_type"], 'fk_Doctor_Doctor_type1_idx');

            $table->unique(["idDoctor"], 'idDoctor_UNIQUE');


            $table->foreign('users_idUsers', 'fk_Doctor_users_idx')
                ->references('idUsers')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Doctor_type_idDoctor_type', 'fk_Doctor_Doctor_type1_idx')
                ->references('idDoctor_type')->on('Doctor_type')
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
