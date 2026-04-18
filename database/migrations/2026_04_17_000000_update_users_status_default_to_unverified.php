<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('users')->where('status', 1)->update(['status' => 2]);

        Schema::table('users', function (Blueprint $table) {
            $table->integer('status')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('users')->where('status', 2)->update(['status' => 1]);

        Schema::table('users', function (Blueprint $table) {
            $table->integer('status')->default(1)->change();
        });
    }
};
