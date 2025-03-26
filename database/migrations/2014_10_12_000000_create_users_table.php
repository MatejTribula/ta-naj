<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('usertype')->default(0);
            $table->string('password');
            $table->timestamps();
        });


        $input = [
            'email' => 'admin@admin.sk',
            'password' => '12346578', // Plain text password
        ];

        DB::table('users')->insert([
            'email' => $input['email'],
            'usertype' => '1',
            'password' => Hash::make($input['password']),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
