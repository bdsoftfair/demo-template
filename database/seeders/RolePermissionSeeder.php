<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create Roles
        $roleSuperAdmin =  Role::create(['name' => 'superadmin']);
        $roleAdmin =  Role::create(['name' => 'admin']);
        $roleEditor =  Role::create(['name' => 'editor']);
        $roleUser =  Role::create(['name' => 'user']);

        // Permission List as array
        $permissions = [
            [
                'group_name' => 'dashboard',
                'permissions' => [
                    // Dashboard
                    'dashboard.view',
                    'dashboard.edit',
                ]
            ],
            [
                'group_name' => 'admin',
                'permissions'=> [
                    //Admin Permissions
                    'admin.index',
                    'admin.create',
                    'admin.store',
                    'admin.edit',
                    'admin.update',
                    'admin.destroy',
                ]
            ], 
            [
                'group_name' => 'role',
                'permissions'=> [
                    //Role Permissions
                    'role.index',
                    'role.create',
                    'role.store',
                    'role.edit',
                    'role.update',
                    'role.destroy',
                ]
            ],

            [
                //user settings permission
                'group_name' => 'users',
                'permissions' => [
                    'users.index',
                    'users.destroy',
                    'users.status.edit',
                    'users.status.update',
                    'users.mark(active,deactive,delete)',
                ]
            ],
            [
                'group_name' => 'profile',
                'permissions'=> [
                   //Profile Permissions
                   'profile.edit',
                   'profile.update',
                   'profile.passwordChange'
                ]
            ],
            [
                //general settings permission
                'group_name' => 'settings',
                'permissions' => [
                    'generalSettings.index',
                    'generalSettings.update',
                ]
            ],
            [
                //expense category settings permission
                'group_name' => 'expenseCategory',
                'permissions' => [
                    'expense.category.index',
                    'expense.category.store',
                    'expense.category.edit',
                    'expense.category.delete',
                    'expense.category.parmanentDelete',
                ]
            ],
            [
                //expense  settings permission
                'group_name' => 'expense',
                'permissions' => [
                    'expense.index',
                    'expense.store',
                    'expense.edit',
                    'expense.delete',
                    'expense.parmanentDelete',
                ]
            ],
            [
                'group_name' => 'blog',
                'permissions'=> [
                    //Blog Permissions
                    'blog.create',
                    'blog.view',
                    'blog.store',
                    'blog.edit',
                    'blog.delete',
                    'blog.approve',
                ]
            ],
            [
                //employee settings permission
                'group_name' => 'employee',
                'permissions' => [
                    'employee.index',
                    'employee.create',
                    'employee.edit',
                    'employee.delete',
                    'employee.restore',
                    'employee.parmanentDelete',
                ]
            ],
            [
                //employee work report permission
                'group_name' => 'work.report',
                'permissions' => [
                    'work.report.index',
                    'work.report.status.edit',
                    'work.report.status.update',
                    'work.report.delete',
                    'work.report.restore',
                    'work.report.parmanentDelete',
                ]
            ],
            [
                //employee work report permission
                'group_name' => '.report',
                'permissions' => [
                    'meeting.report.index',
                    'meeting.report.status.edit',
                    'meeting.report.status.update',
                    'meeting.report.delete',
                    'meeting.report.restore',
                    'meeting.report.parmanentDelete',
                ]
            ],
            [
                //invoice permission
                'group_name' => 'invoice',
                'permissions' => [
                    'invoice.index',
                    'invoice.create',
                    'invoice.edit',
                    'invoice.update',
                    'invoice.delete',
                    'invoice.parmanentDelete',
                ]
            ]
           
        ];

        // Create and  Assign Permissions
        
        for ($i=0; $i < count($permissions); $i++) { 
            
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j=0; $j < count($permissions[$i]['permissions']); $j++) { 
                 //create permission
                $permission = Permission::create([
                            'name' => $permissions[$i]['permissions'][$j], 
                            'group_name' => $permissionGroup,
                            // 'guard_name' => 'admin'
                        ]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
            
        }

        //  //asign permisions
        //  for($i = 0; $i<count($permissions); $i++){
        //     $permissionGroup = $permissions[$i]['group_name'];

        //     for($j = 0; $j<count($permissions[$i]['permissions']); $j++){
        //         //create permission
        //         $permission = Permission::create([
        //             'name' => $permissions[$i]['permissions'][$j],
        //             'group_name' => $permissionGroup,
        //             'guard_name' => 'admin'
        //         ]);

        //         //assign permission to role
        //         $roleSuperAdmin->givePermissionTo($permission);
        //         $permission->assignRole($roleSuperAdmin);
        //     }
        // }

    }
}
