<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->bigIncrements('id');
            $table->string('book_name',255)->collation('utf8_unicode_ci');
            $table->string('author_name',255)->collation('utf8_unicode_ci');
            $table->string('publisher_name',255)->collation('utf8_unicode_ci');
            $table->string('language',255);
            $table->string('category_name',255)->collation('utf8_unicode_ci')->nullable();
            $table->text('topics')->collation('utf8_unicode_ci')->nullable();
            $table->text('book_image')->nullable(true);
            $table->integer('status')->default(0);
            $table->string('type',255)->collation('utf8_unicode_ci')->nullable();
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
        Schema::dropIfExists('books');
    }
}
