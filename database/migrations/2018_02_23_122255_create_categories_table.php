<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('type');
            $table->enum('enable',['yes','no'])->default('yes');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('categories')->insert([
            'title' => 'فاکتور فروش',
            'type' => 'Invoice',
        ]);
        DB::table('categories')->insert([
            'title' => 'فاکتور خرید',
            'type' => 'Invoice',
        ]);
        DB::table('categories')->insert([
            'title' => 'عمومی',
            'type' => 'Article',
        ]);
        DB::table('categories')->insert([
            'title' => 'آموزشی',
            'type' => 'Article',
        ]);
        DB::table('categories')->insert([
            'title' => 'عمومی',
            'type' => 'Item',
        ]);
        DB::table('categories')->insert([
            'title' => 'پشتیبانی',
            'type' => 'Ticket',
        ]);
        DB::table('categories')->insert([
            'title' => 'خدمات نصب',
            'type' => 'Ticket',
        ]);
        DB::table('categories')->insert([
            'title' => 'فروش',
            'type' => 'Income',
        ]);
        DB::table('categories')->insert([
            'title' => 'چک',
            'type' => 'Income',
        ]);

        DB::table('categories')->insert([
            'title' => 'چک',
            'type' => 'Expense',
        ]);

        DB::table('categories')->insert([
            'title' => 'خرید',
            'type' => 'Expense',
        ]);
        DB::table('categories')->insert([
            'title' => 'عمومی',
            'type' => 'File',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
