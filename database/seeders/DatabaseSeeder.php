<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123123123'),
        ]);

        // Create vendor type (Manufacturer, Polisher, Stone-Setter, Additional Vendor)
        $vendorTypes = [
            'Manufacturer',
            'Polisher',
            'Stone-Setter',
            'Additional Vendor',
        ];

        foreach ($vendorTypes as $vendorType) {
            VendorType::create([
                'name' => $vendorType,
            ]);
        }
    }
}
