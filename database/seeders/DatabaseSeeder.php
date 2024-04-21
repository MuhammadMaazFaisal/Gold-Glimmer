<?php

namespace Database\Seeders;

use App\Models\MetalType;
use App\Models\ProductType;
use App\Models\Purchasing;
use App\Models\User;
use App\Models\Vendor;
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
            'Manufacturing',
            'Polishing',
            'Stone Setting',
            'Additional Vendor',
        ];

        foreach ($vendorTypes as $vendorType) {
            VendorType::create([
                'name' => $vendorType,
            ]);
        }

        $metalTypes = [
            'issue',
            'receive',
        ];

        foreach ($metalTypes as $metalType) {
            MetalType::create([
                'name' => $metalType,
            ]);
        }


        // Create vendor
        $vendor = Vendor::create([
            'id' => 'existing',
            'name' => 'existing',
            'type' => 4,
            'address' => 'Address',
            'phone' => '1234567890',
            '18k' => 0,
            '21k' => 0,
            '22k' => 0,
            'status' => 1,
        ]);

        Purchasing::create([
            'id' => 'existing',
            'vendor_id' => 'existing',
            'total' => 0,
        ]);

        $productTypes = [
            'Set',
            'Tops',
            'Ring',
            'Braclet',
            'Safety Chain',
            'Clip',
            'Kariyan',
            'Locket',
            'Locket Set',
            'Bangles',
            'Kara',
            'Bindia',
            'Kara + Locket set',
            'Order',
            'Latkan',
            'Bangles Set',
            'Set+ring',
            'Repairing',
            'Natt',
            'Cap',
            'Polish paid',
            'Jhumar',
        ];

        foreach ($productTypes as $productType) {
            ProductType::create([
                'name' => $productType,
            ]);
        }
    }
}
