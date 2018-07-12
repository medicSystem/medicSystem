<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'Coupon';

    /**
     * Run the migrations.
     * @table Coupon
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
            $table->integer('Patient_idPatient');
            $table->integer('Doctor_idDoctor');
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
