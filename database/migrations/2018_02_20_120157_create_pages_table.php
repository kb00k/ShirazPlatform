<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->longText('text')->nullable();
            $table->unsignedBigInteger('visit')->default(0);
            $table->enum('level',['guest','user'])->default('guest');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('pages')->insert([
            'title' => 'نرم افزار شیراز',
            'text' => 'Index',
            'level' => 'guest',
        ]);
        DB::table('pages')->insert([
            'title' => 'درباره ما',
            'text' => 'About US',
            'level' => 'guest',
        ]);
        DB::table('pages')->insert([
            'title' => 'تماس با ما',
            'text' => 'Contact US',
            'level' => 'guest',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
