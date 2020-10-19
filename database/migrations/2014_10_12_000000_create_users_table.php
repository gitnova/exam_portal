<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('role');
            $table->tinyInteger('is_active')->default(0);
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'first_name' => 'Teacher', 
                'last_name' => 'Admin',
                'role' => 'teacher',
                'is_active' => '1',
                'email' => 'teacher_admin@examportal.com',
                'password' => Hash::make('123456'),
                'created_at' => date_create()
            ]
        ]);

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
