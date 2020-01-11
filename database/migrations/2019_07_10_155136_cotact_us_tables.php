<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CotactUsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->collation('utf8_unicode_ci')->nullable();
            $table->string('email')->collation('utf8_unicode_ci')->nullable();
            $table->string('mobile')->collation('utf8_unicode_ci')->nullable();
            $table->string('subject')->collation('utf8_unicode_ci')->nullable();
            $table->string('message')->collation('utf8_unicode_ci')->nullable();
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
        Schema::dropIfExists('contact_us');
    }
}
