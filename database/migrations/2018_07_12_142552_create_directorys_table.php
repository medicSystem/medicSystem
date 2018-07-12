<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectorysTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'directorуs';

    /**
     * Run the migrations.
     * @table directorys
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idDirectory');
            $table->string('disease_name', 60);
            $table->string('category', 60);
            $table->string('subcategory', 60);
            $table->text('treatment');
            $table->text('symptoms');
            $table->string('picture', 100);
            $table->timestamps();

            $table->unique(["idDirectory"], 'idDirectory_UNIQUE');

            $table->unique(["disease_name"], 'disease_name_UNIQUE');
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
