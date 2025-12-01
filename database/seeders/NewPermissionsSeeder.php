<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class NewPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define all new permissions
        $permissions = [
            // News Management (7 permissions)
            [
                'name' => 'view_news',
                'display_name' => 'View News',
                'description' => 'Can view news list and details'
            ],
            [
                'name' => 'create_news',
                'display_name' => 'Create News',
                'description' => 'Can create new news articles'
            ],
            [
                'name' => 'edit_news',
                'display_name' => 'Edit News',
                'description' => 'Can edit existing news articles'
            ],
            [
                'name' => 'delete_news',
                'display_name' => 'Delete News',
                'description' => 'Can delete news articles'
            ],
            [
                'name' => 'publish_news',
                'display_name' => 'Publish News',
                'description' => 'Can publish/unpublish news articles'
            ],
            [
                'name' => 'manage_news_categories',
                'display_name' => 'Manage News Categories',
                'description' => 'Can manage news categories'
            ],
            [
                'name' => 'manage_news_tags',
                'display_name' => 'Manage News Tags',
                'description' => 'Can manage news tags'
            ],

            // Gallery Management (5 permissions)
            [
                'name' => 'view_gallery',
                'display_name' => 'View Gallery',
                'description' => 'Can view gallery images'
            ],
            [
                'name' => 'create_gallery',
                'display_name' => 'Create Gallery',
                'description' => 'Can upload new gallery images'
            ],
            [
                'name' => 'edit_gallery',
                'display_name' => 'Edit Gallery',
                'description' => 'Can edit gallery images'
            ],
            [
                'name' => 'delete_gallery',
                'display_name' => 'Delete Gallery',
                'description' => 'Can delete gallery images'
            ],
            [
                'name' => 'manage_gallery_categories',
                'display_name' => 'Manage Gallery Categories',
                'description' => 'Can manage gallery categories'
            ],

            // Services Management (4 permissions)
            [
                'name' => 'view_services',
                'display_name' => 'View Services',
                'description' => 'Can view services list'
            ],
            [
                'name' => 'create_services',
                'display_name' => 'Create Services',
                'description' => 'Can create new services'
            ],
            [
                'name' => 'edit_services',
                'display_name' => 'Edit Services',
                'description' => 'Can edit existing services'
            ],
            [
                'name' => 'delete_services',
                'display_name' => 'Delete Services',
                'description' => 'Can delete services'
            ],

            // Testimonials Management (4 permissions)
            [
                'name' => 'view_testimonials',
                'display_name' => 'View Testimonials',
                'description' => 'Can view testimonials list'
            ],
            [
                'name' => 'create_testimonials',
                'display_name' => 'Create Testimonials',
                'description' => 'Can create new testimonials'
            ],
            [
                'name' => 'edit_testimonials',
                'display_name' => 'Edit Testimonials',
                'description' => 'Can edit existing testimonials'
            ],
            [
                'name' => 'delete_testimonials',
                'display_name' => 'Delete Testimonials',
                'description' => 'Can delete testimonials'
            ],

            // Contact Messages (3 permissions)
            [
                'name' => 'view_contact_messages',
                'display_name' => 'View Contact Messages',
                'description' => 'Can view contact form messages'
            ],
            [
                'name' => 'reply_contact_messages',
                'display_name' => 'Reply Contact Messages',
                'description' => 'Can reply to contact messages'
            ],
            [
                'name' => 'delete_contact_messages',
                'display_name' => 'Delete Contact Messages',
                'description' => 'Can delete contact messages'
            ],

            // About Content (2 permissions)
            [
                'name' => 'manage_about_content',
                'display_name' => 'Manage About Content',
                'description' => 'Can manage about page content'
            ],
            [
                'name' => 'manage_company_values',
                'display_name' => 'Manage Company Values',
                'description' => 'Can manage company values'
            ],

            // Stats (1 permission)
            [
                'name' => 'manage_stats',
                'display_name' => 'Manage Stats',
                'description' => 'Can manage statistics/counters'
            ],
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission['name']],
                [
                    'display_name' => $permission['display_name'],
                    'description' => $permission['description']
                ]
            );
        }

        // Assign all new permissions to admin role
        $adminRole = Role::where('name', 'admin')->first();
        
        if ($adminRole) {
            $permissionIds = Permission::whereIn('name', array_column($permissions, 'name'))->pluck('id');
            $adminRole->permissions()->syncWithoutDetaching($permissionIds);
            
            $this->command->info('All new permissions assigned to admin role.');
        }

        $this->command->info('26 new permissions created successfully!');
    }
}
