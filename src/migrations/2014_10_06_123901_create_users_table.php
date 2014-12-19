<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function($table)
    {
      $table->increments('id');
      $table->string('username', 50)->unique();
      $table->string('full_name', 75);
      $table->text('bio');
      $table->string('email', 150)->unique();
      $table->string('slug', 80)->unique();
      $table->string('password', 60);
      $table->boolean('status')->default(0);
      $table->timestamp('last_login');
      $table->timestamps();
    });

    DB::table('users')->insert(array(
      'username' => 'Jim',
      'full_name' => 'Jimmy Guitar',
      'bio' => 'The Boss!',
      'email' => 'email@example.com',
      'slug' => 'jimmy-guitar',
      'password' => Hash::make('password'),
      'status' => '1',
    ));
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('users');
  }
}