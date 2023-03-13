<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AccountSeeder::class);
        $this->call(AttachedTableSeeder::class);
        $this->call(AttrValuesTableSeeder::class);
        $this->call(BitacoraSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(SummaryTableSeeder::class);
        $this->call(ToursTableSeeder::class);
        $this->call(ToursAttrTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
