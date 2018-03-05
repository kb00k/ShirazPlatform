<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('mobile')->unique();
            $table->string('title')->nullable();
            $table->string('api_key')->nullable();
            $table->string('website')->nullable();
            $table->enum('level',['admin','user','staff'])->default('user');
            $table->enum('active',['yes','no'])->default('yes');
            $table->string('password');
            $table->string('telegram_user_id')->nullable();
            $table->text('note')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('users')->insert([
            'name' => 'علی قاسم زاده',
            'email' => 'it.ghasemzadeh@gmail.com',
            'mobile' => '09177886099',
            'title' => 'مدیر نرم افزار شیراز',
            'level' => 'admin',
            'active' => 'yes',
            'password' => Hash::make('p@ssw0rd'),
        ]);
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
