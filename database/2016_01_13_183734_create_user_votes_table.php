<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("user_votes", function(Blueprint $table){
		$table->increments('id');

		$table->integer("girl_id")->unsigned();
		$table->foreign("girl_id")
		      ->references("id")->on("girls")
		      ->onDelete("cascade");

		$table->integer("user_id")->unsigned();
		$table->foreign("user_id")
		      ->references("id")->on("users");
		      ->onDelete("set null");

		$table->timestamps();
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("user_votes", function(Blueprint $table){
		$table->dropForeign("user_votes_user_id_foreign");
		$table->dropForeign("user_votes_girl_id_foreign");
	});

	Schema::drop("user_votes");
    }
}
