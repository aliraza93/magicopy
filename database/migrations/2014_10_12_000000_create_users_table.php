<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->text('linkout')->nullable();
            $table->integer('member_of')->default(0);
            $table->integer('parent_member')->default(0);
            $table->string('linked_user_role')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('cmp_name')->nullable();
            $table->text('cmp_description')->nullable();
            $table->string('auth_token')->nullable();
            $table->string('role')->nullable();
            $table->integer('status')->default(0);
            $table->string('phone')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('country_name')->nullable();
            $table->integer('current_project')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
