<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_details', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->bigIncrements('id');
            $table->integer('book_id');
            $table->string('chapter_no',255)->collation('utf8_unicode_ci')->nullable(true);
            $table->string('chapter_name',255)->collation('utf8_unicode_ci')->nullable(true);
            $table->string('sub_chapter_no',255)->collation('utf8_unicode_ci')->nullable(true);
            $table->string('sub_chapter_name',255)->collation('utf8_unicode_ci')->nullable(true);
            $table->longText('meta_info')->collation('utf8_unicode_ci');

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
        Schema::dropIfExists('book_details');
    }
}

