<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::factory(12)
                ->sequence(
                    ['name' => 'Manage Users'],
                    ['name' => 'Can add role to Users'],
                    ['name' => 'Can Create new Post'],
                    ['name' => 'Edit and delete their unapproved posts'],
                    ['name' => 'Edit and delete their approved posts'],
                    ['name' => 'Publish posts to live site'],
                    ['name' => 'Edit all users posts that are not published'],
                    ['name' => 'Delete all users posts that are not published'],
                    ['name' => 'Edit all users published posts'],
                    ['name' => 'Delete all users published posts'],
                    ['name' => 'Manage themes'],
                    ['name' => 'Can edit dashboard'],
                )
                ->create();
    }
}
