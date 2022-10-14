<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up() //追加
    {
        Schema::table('contact_forms', function (Blueprint $table) {
            $table->string('title', 50)->after('name');// after関数はどのカラムの後に位置させるかの記載 
        });
    }

    /**
     * Reverse the migrations.“
     *
     * @return void
     */
    public function down() //ロールバック
    {
        Schema::table('contact_forms', function (Blueprint $table) {
            $table->dropColumn('title');
        });
    }
};
