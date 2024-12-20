<?php

namespace Database\Seeders;
use DB;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Afraym',
            'email' => 'afraymn@gmail.com',
            'password' => bcrypt('12345678'),
            'image' => 'https://randomuser.me/api/portraits/men/27.jpg',
            'role' => 'super-admin',
        ]);

        $user2 = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('12345678'),
            'image' => 'https://randomuser.me/api/portraits/men/28.jpg',
        ]);
        
        // Attach permissions to roles
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        $createPuppy = Permission::create(['name' => 'create-puppy']);
        $viewPuppy = Permission::create(['name' => 'view-puppy']);
        $updatePuppy = Permission::create(['name' => 'update-puppy']);
        $deletePuppy = Permission::create(['name' => 'delete-puppy']);

        $superAdminRole->permissions()->attach([$createPuppy->id, $viewPuppy->id, $updatePuppy->id, $deletePuppy->id]);
        $adminRole->permissions()->attach([$createPuppy->id, $viewPuppy->id, $updatePuppy->id, $deletePuppy->id]);
        $userRole->permissions()->attach([$viewPuppy->id]);

        // Assign super-admin role to users
        $user1->roles()->attach($superAdminRole);
        $user2->roles()->attach($superAdminRole);
        ini_set('memory_limit', '-1');

        DB::unprepared(file_get_contents(__dir__ . '/breeds.sql'));
    }
}
