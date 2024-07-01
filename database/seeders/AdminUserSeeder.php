<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::where('name', 'admin')->first();

        $user = User::updateOrCreate([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole($adminRole);

        User::updateOrCreate([
            'name' => 'visita',
            'email' => 'visita@gmail.com',
            'password' => bcrypt('12345678')
        ]);


        // Asignar el permiso "admin" directamente al usuario
        
    }
}
