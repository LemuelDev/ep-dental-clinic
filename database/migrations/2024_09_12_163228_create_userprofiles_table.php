<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('userprofiles', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('extensionname');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('sex');
            $table->string('birthday');
            $table->string('age');
            $table->string("emergency_name");
            $table->string("emergency_contact");
            $table->string("emergency_relationship");
            $table->string('user_status')->default('enable');
            $table->string('user_type')->default('patient');
            $table->string('isPending')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userprofiles');
    }
};
