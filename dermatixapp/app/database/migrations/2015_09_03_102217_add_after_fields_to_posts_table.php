<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddAfterFieldsToPostsTable extends Migration {

    /**
     * Make changes to the table.
     *
     * @return void
     */
    public function up()
    {   
        Schema::table('posts', function(Blueprint $table) {     
            
            $table->string('after_file_name')->nullable();
            $table->integer('after_file_size')->nullable();
            $table->string('after_content_type')->nullable();
            $table->timestamp('after_updated_at')->nullable();

        });

    }

    /**
     * Revert the changes to the table.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function(Blueprint $table) {

            $table->dropColumn('after_file_name');
            $table->dropColumn('after_file_size');
            $table->dropColumn('after_content_type');
            $table->dropColumn('after_updated_at');

        });
    }

}
