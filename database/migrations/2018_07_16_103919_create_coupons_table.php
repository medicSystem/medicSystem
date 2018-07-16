<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'coupons';

    /**
     * Run the migrations.
     * @table coupons
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->dateTime('date');
            $table->string('status', 10);
            $table->unsignedInteger('patients_id');
            $table->unsignedInteger('doctors_id');
            $table->timestamps();
            $table->foreign('doctors_id')->references('id')-> on('doctors');
            $table->foreign('patients_id')->references('id')-> on('patients');
            //$table->unique(["id"], 'id_UNIQUE');

            $table->unique(["date"], 'date_UNIQUE');
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
