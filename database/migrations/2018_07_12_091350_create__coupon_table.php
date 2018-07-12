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
            $table->integer('Patient_users_idUsers');
            $table->integer('Doctor_idDoctor');
            $table->integer('Doctor_users_idUsers');
            $table->integer('Doctor_Doctor_type_idDoctor_type');
            $table->timestamps();

            $table->index(["Patient_idPatient", "Patient_users_idUsers"], 'fk_Coupon_Patient1_idx');

            $table->index(["Doctor_idDoctor", "Doctor_users_idUsers", "Doctor_Doctor_type_idDoctor_type"], 'fk_Coupon_Doctor1_idx');

            $table->unique(["idCoupon"], 'idCoupon_UNIQUE');


            $table->foreign('Patient_idPatient', 'fk_Coupon_Patient1_idx')
                ->references('idPatient')->on('Patient')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Doctor_idDoctor', 'fk_Coupon_Doctor1_idx')
                ->references('idDoctor')->on('Doctor')
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
