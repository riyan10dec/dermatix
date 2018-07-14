<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddBeforeFieldsToPostsTable extends Migration {

    /**
     * Make changes to the table.
     *
     * @return void
     */
    public function up()
    {   
        Schema::table('posts', function(Blueprint $table) {     
            
            $table->string('before_file_name')->nullable();
            $table->integer('before_file_size')->nullable();
            $table->string('before_content_type')->nullable();
            $table->timestamp('before_updated_at')->nullable();

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

            $table->dropColumn('before_file_name');
            $table->dropColumn('before_file_size');
            $table->dropColumn('before_content_type');
            $table->dropColumn('before_updated_at');

        });
    }

}
