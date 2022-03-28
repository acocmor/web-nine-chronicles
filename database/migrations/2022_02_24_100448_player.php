<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Player extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('Address');
            $table->boolean('IsBanned')->default(0);
            $table->boolean('IsPremium')->default(0);
            $table->boolean('IsProtected')->default(0);
            $table->boolean('IsIgnoringMessage')->default(0);
            $table->string('DiscordID')->nullable();
            $table->integer('PremiumEndBlock')->default(0);
            $table->integer('ArenaBanner')->default(0);
            $table->integer('ArenaIcon')->default(0);
            $table->integer('SwordSkin')->default(0);
            $table->integer('FriendViewSkin')->default(0);
            $table->string('Info')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('players');
    }
}
