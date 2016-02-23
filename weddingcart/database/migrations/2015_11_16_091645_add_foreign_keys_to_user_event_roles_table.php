<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserEventRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_event_roles', function(Blueprint $table)
		{
			$table->foreign('user_event_id', 'fk_user_event_roles_user_events1')->references('id')->on('user_events')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk_user_event_roles_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_event_roles', function(Blueprint $table)
		{
			$table->dropForeign('fk_user_event_roles_user_events1');
			$table->dropForeign('fk_user_event_roles_users1');
		});
	}

}
