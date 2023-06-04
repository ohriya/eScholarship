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
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('gender');
            $table->string('phone_number')->unique();
            $table->string('perma_address');
            $table->string('dob');
            $table->float('high_school_gpa');
            $table->string('high_school_name');
            $table->string('caste');
            $table->string('parent_id');
            $table->string('your_photo');
            $table->string('citizenship_front');
            $table->string('citizenship_back');           
            $table->string('marksheet_photo');
            $table->integer('user_id');
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
        Schema::dropIfExists('profiles');
    }
};
