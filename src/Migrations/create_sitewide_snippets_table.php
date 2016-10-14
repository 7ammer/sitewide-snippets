<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitewideSnippetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('sitewide_snippets', function($table){
		    $table->increments('id');
		    $table->string('title');
		    $table->string('legend');
		    $table->text('form_elements');
		    $table->text('snippet_1');
		    $table->text('snippet_2');
		    $table->text('snippet_3');
		    $table->text('snippet_4');
		    $table->text('snippet_5');
		    $table->text('snippet_6');
		    $table->text('snippet_7');
		    $table->text('snippet_8');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::drop('sitewide_snippets');
    }
}
