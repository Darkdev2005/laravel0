<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Manager ni role_id = 1 ga o'rnatish
        DB::table('users')
            ->where('email', 'manager@company.com')
            ->update(['role_id' => 1]);
            
        // Client ni role_id = 2 ga o'rnatish  
        DB::table('users')
            ->where('email', 'client@company.com')
            ->update(['role_id' => 2]);
    }

    public function down(): void
    {
        // Orqaga qaytarish
        DB::table('users')
            ->whereIn('email', ['manager@company.com', 'client@company.com'])
            ->update(['role_id' => 1]);
    }
};