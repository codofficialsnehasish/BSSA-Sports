<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class RoleAssignmentseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get users
        $adminUser = User::where('email', 'admin@admin.com')->first();
        // Assign roles to users
        if ($adminUser) {
            $adminUser->assignRole('Super Admin');
        }
    }
}
