<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->enum('role', ['teacher', 'student']);
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->tinyInteger('is_active')->default(0);
            $table->string('email')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->timestamps();
        });

        User::create([
            'first_name' => 'Teacher',
            'last_name' => 'Admin',
            'email' => 'teacher_admin@examportal.com',
            'password' => Hash::make('12345678'),
            'is_active' => 1,
            'created_at' => date_create()
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
