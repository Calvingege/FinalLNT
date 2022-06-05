<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminIdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('admin_ids', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }
    
    // membuat ranah admin
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('admin_id')->nullable();
            $table->string('PhoneNumber');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_ids');
    }
}
