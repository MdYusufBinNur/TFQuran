<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTafTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taf_token', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->bigIncrements('id');
            $table->integer('ayah_id')->default(0);
            $table->integer('token_no')->default(0);
            $table->text('token_trans')->collation('utf8_unicode_ci');
            $table->text('token_expl_no')->collation('utf8_unicode_ci')->nullable(true);
            $table->text('token_expl')->collation('utf8_unicode_ci')->nullable(true);
            $table->text('image_token')->collation('utf8_unicode_ci')->nullable(true);
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
        Schema::dropIfExists('taf_token');
    }
}
