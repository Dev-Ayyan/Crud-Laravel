<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(CountrySeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('permissions')->truncate(); // Using truncate function so all info will be cleared when re-seeding.
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Permission::create([
                'name'=>'roles',         
        ]);
        Permission::create([
                'name'=>'users',         
        ]);
        Permission::create([
                'name'=>'pages',
                
        ]);
        Permission::create([
                'name'=>'banners',    
        ]);
         Permission::create([
                'name'=>'header-menu-links',    
        ]);
         Permission::create([
                'name'=>'footer-menu-links',    
        ]);
          Permission::create([
                'name'=>'footers',    
        ]);
    }
}
