<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnerBuilding extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_owner', function (Blueprint $table) {
            $table->unsignedInteger("building_id");
            $table->unsignedInteger("owner_id");
            $table->dateTime("ownership_start")->useCurrent();
            $table->primary(["building_id", "owner_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('building_owner');
    }
}
