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
            $table->increments('idCoupon');
            $table->dateTime('date');
            $table->string('status', 10);
            $table->integer('patients_idPatient');
            $table->integer('doctors_idDoctor');
            $table->timestamps();

            $table->unique(["idCoupon"], 'idCoupon_UNIQUE');
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
