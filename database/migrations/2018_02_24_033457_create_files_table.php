<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('item_id')->nullable();
            $table->enum('type',['free','paid'])->default('paid');
            $table->decimal('price', 15, 0)->nullable();
            $table->longText('text');
            $table->text('description')->nullable();
            $table->integer('version_id');
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
        Schema::dropIfExists('files');
    }
}
