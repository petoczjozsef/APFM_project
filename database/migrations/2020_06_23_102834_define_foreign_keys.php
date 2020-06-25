<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DefineForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("building_owner", function(Blueprint $table) {
            $table->foreign("building_id")->references("id")->on("buildings")->onDelete('cascade');
            $table->foreign("owner_id")->references("id")->on("owners")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (DB::getDriverName() !== 'sqlite') {
            Schema::table("building_owner", function (Blueprint $table) {
                $table->dropForeign(["building_id"]);
                $table->dropForeign(["owner_id"]);
            });
        }
    }
}
