<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_info', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('AppId')->nullable();
            $table->string('PushKey')->nullable();
            $table->string('UrlStr')->nullable();
            $table->string('UpdateUrl')->nullable();
            $table->timestamp('created_at')->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_info');
    }
}
