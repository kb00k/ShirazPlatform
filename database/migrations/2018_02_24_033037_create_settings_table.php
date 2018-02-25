<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('key')->unique();
            $table->string('type'); //file,yesno,text,textarea,select,select-table,enabled
            $table->text('options')->nullable();
            $table->timestamps();
        });

        DB::table('settings')->insert([
            'title' => 'عنوان سایت',
            'category_id' => '1',
            'description' => 'عنوان سایت شما که در بالای سایت نمایش داده می شود.',
            'key' => 'platform.name',
            'type' => 'text',
        ]);
        DB::table('settings')->insert([
            'title' => 'آیکون سایت',
            'category_id' => '1',
            'description' => '',
            'key' => 'platform.main-icon',
            'type' => 'text-ltr',
        ]);
        DB::table('settings')->insert([
            'title' => 'ترکیب رنگ نوار بالایی',
            'category_id' => '1',
            'description' => '',
            'key' => 'platform.navbar-type',
            'type' => 'text-ltr',
        ]);
        DB::table('settings')->insert([
            'title' => 'ترکیب رنگ نوار پایینی',
            'category_id' => '1',
            'description' => '',
            'key' => 'platform.navbar-bottm-type',
            'type' => 'text-ltr',
        ]);
        DB::table('settings')->insert([
            'title' => 'آدرس سیستم مدیریت سیستم',
            'category_id' => '1',
            'description' => '',
            'key' => 'platform.admin-route',
            'type' => 'text-ltr',
        ]);
        DB::table('settings')->insert([
            'title' => 'صفحه ورود پیشفرض',
            'category_id' => '1',
            'description' => 'پس از اینکه کاربر وارد یا در سایت ثبت نام کرد به چه صفحه ای برود.',
            'key' => 'platform.redirectTo',
            'type' => 'text-ltr',
        ]);
        DB::table('settings')->insert([
            'title' => 'کلاس محتوایی',
            'category_id' => '1',
            'description' => '',
            'key' => 'platform.main-container',
            'type' => 'text-ltr',
        ]);
        DB::table('settings')->insert([
            'title' => 'کلاس محتوایی نوار بالا و پایین',
            'category_id' => '1',
            'description' => '',
            'key' => 'platform.navbar-container',
            'type' => 'text-ltr',
        ]);
        DB::table('settings')->insert([
            'title' => 'مدت زمان گش',
            'category_id' => '1',
            'description' => '',
            'key' => 'platform.cache-time',
            'type' => 'text-ltr',
        ]);
        DB::table('settings')->insert([
            'title' => 'فعال بودن ثبت نام',
            'category_id' => '1',
            'description' => '',
            'key' => 'platform.enable-register',
            'type' => 'enable',
        ]);
        DB::table('settings')->insert([
            'title' => 'نوع موقعیت نوار بالایی',
            'category_id' => '1',
            'description' => '',
            'key' => 'platform.header-position',
            'type' => 'text-ltr',
        ]);
        DB::table('settings')->insert([
            'title' => 'نوع موقعیت نوار پایینی',
            'category_id' => '1',
            'description' => '',
            'key' => 'platform.footer-position',
            'type' => 'text-ltr',
        ]);
        DB::table('settings')->insert([
            'title' => 'انواع دسته بندی',
            'category_id' => '1',
            'description' => '',
            'key' => 'platform.category_type',
            'type' => 'text-ltr',
        ]);
        DB::table('settings')->insert([
            'title' => 'صفحه فرود یا اولیه',
            'category_id' => '3',
            'description' => '',
            'key' => 'platform.index-page-id',
            'type' => 'select-table',
            'options' => 'pages,title'
        ]);
        DB::table('settings')->insert([
            'title' => 'صفحه ارتباط با ما',
            'category_id' => '3',
            'description' => '',
            'key' => 'platform.contact-us-page-id',
            'type' => 'select-table',
            'options' => 'pages,title'
        ]);
        DB::table('settings')->insert([
            'title' => 'صفحه درباره ما',
            'category_id' => '3',
            'description' => '',
            'key' => 'platform.about-us-page-id',
            'type' => 'select-table',
            'options' => 'pages,title'
        ]);

        DB::table('settings')->insert([
            'title' => 'مدیر اصلی سایت',
            'category_id' => '1',
            'description' => '',
            'key' => 'platform.main-admin-user-id',
            'type' => 'select-table',
            'options' => 'users,name'
        ]);

        DB::table('settings')->insert([
            'title' => 'فعال بودن فیش بانکی',
            'category_id' => '2',
            'description' => '',
            'key' => 'gateway.receipt.enable',
            'type' => 'yesno',
        ]);
        DB::table('settings')->insert([
            'title' => 'حساب متصل به فیش بانکی',
            'category_id' => '2',
            'description' => '',
            'key' => 'gateway.receipt.account_id',
            'type' => 'select-table',
            'options' => 'accounts,title'
        ]);
        DB::table('settings')->insert([
            'title' => 'عنوان درگاه فیش بانکی',
            'category_id' => '2',
            'description' => '',
            'key' => 'gateway.receipt.title',
            'type' => 'text',
        ]);
        DB::table('settings')->insert([
            'title' => 'فعال بودن زرین پال',
            'category_id' => '2',
            'description' => '',
            'key' => 'gateway.zarinpal.enable',
            'type' => 'yesno',
        ]);
        DB::table('settings')->insert([
            'title' => 'حساب متصل به زرین پال',
            'category_id' => '2',
            'description' => '',
            'key' => 'gateway.zarinpal.account_id',
            'type' => 'select-table',
            'options' => 'accounts,title'
        ]);
        DB::table('settings')->insert([
            'title' => 'عنوان درگاه زرین پال',
            'category_id' => '2',
            'description' => '',
            'key' => 'gateway.zarinpal.title',
            'type' => 'text',
        ]);
        DB::table('settings')->insert([
            'title' => 'Merchant ID زرین پال',
            'category_id' => '2',
            'description' => '',
            'key' => 'gateway.zarinpal.merchant-id',
            'type' => 'text-ltr',
        ]);
        DB::table('settings')->insert([
            'title' => 'نوع درگاه زرین پال',
            'category_id' => '2',
            'description' => '',
            'key' => 'gateway.zarinpal.type',
            'type' => 'select',
            'options' => 'zarin-gate,normal'
        ]);
        DB::table('settings')->insert([
            'title' => 'سرور زرین پال',
            'category_id' => '2',
            'description' => '',
            'key' => 'gateway.zarinpal.server',
            'type' => 'select',
            'options' => 'germany,iran,test',
        ]);
        DB::table('settings')->insert([
            'title' => 'فعال بودن درگاه به پرداخت',
            'category_id' => '2',
            'description' => '',
            'key' => 'gateway.mellat.enable',
            'type' => 'yesno',
        ]);
        DB::table('settings')->insert([
            'title' => 'حساب متصل به درگاه به پرداخت',
            'category_id' => '2',
            'description' => '',
            'key' => 'gateway.mellat.account_id',
            'type' => 'select-table',
            'options' => 'accounts,title',
        ]);
        DB::table('settings')->insert([
            'title' => 'عنوان درگاه به پرداخت',
            'category_id' => '2',
            'description' => '',
            'key' => 'gateway.mellat.title',
            'type' => 'text',
        ]);
        DB::table('settings')->insert([
            'title' => 'نام کاربری به پرداخت',
            'category_id' => '2',
            'description' => '',
            'key' => 'gateway.mellat.username',
            'type' => 'text-ltr',
        ]);
        DB::table('settings')->insert([
            'title' => 'کلمه عبور به پرداخت',
            'category_id' => '2',
            'description' => '',
            'key' => 'gateway.mellat.password',
            'type' => 'text-ltr',
        ]);
        DB::table('settings')->insert([
            'title' => 'شماره ترمینال به پرداخت',
            'category_id' => '2',
            'description' => '',
            'key' => 'gateway.mellat.terminalId',
            'type' => 'text-ltr',
        ]);
        DB::table('settings')->insert([
            'title' => 'فعال بودن درگاه سامان کیش',
            'category_id' => '2',
            'description' => '',
            'key' => 'gateway.saman.enable',
            'type' => 'yesno',
        ]);
        DB::table('settings')->insert([
            'title' => 'حساب متصل به درگاه سامان کیش',
            'category_id' => '2',
            'description' => '',
            'key' => 'gateway.saman.account_id',
            'type' => 'select-table',
            'options' => 'accounts,title',
        ]);
        DB::table('settings')->insert([
            'title' => 'عنوان درگاه سامان کیش',
            'category_id' => '2',
            'description' => '',
            'key' => 'gateway.saman.title',
            'type' => 'text',
        ]);
        DB::table('settings')->insert([
            'title' => 'Merchant سامان کیش',
            'category_id' => '2',
            'description' => '',
            'key' => 'gateway.saman.merchant',
            'type' => 'text-ltr',
        ]);
        DB::table('settings')->insert([
            'title' => 'Password سامان کیش',
            'category_id' => '2',
            'description' => '',
            'key' => 'gateway.saman.password',
            'type' => 'text-ltr',
        ]);
        //TODO: Add Other gateway and settings.
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
