<?php

namespace App\Console\Commands;

use Route;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class UpdatePermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permissions:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates & sync the newly created views to have granted permissions upon users and roles.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->createPermissions();
        $this->createSuperAdminRole();
    }

    private function createPermissions()
    {


        $this->info("Starting Permissions synchronizing...");

        $collection = Route::getRoutes();

        $routes = [];

        $permissions = [];

        $bar = $this->output->createProgressBar(count($collection));

        $bar->start();
        $included_routes = [
            // 'admin/administrators',
            // 'admin/users',
            // 'admin/payment',
            // 'admin/cities',
            // 'admin/areas',
            // 'admin/plan',
            'admin/custom_domain',
            // 'admin/faqs',
            // 'admin/features',
            // 'admin/testimonials',
            // 'admin/promotionalbanners',
            // 'admin/language-settings',
            // 'admin/time',
            // 'admin/orders',
            // 'admin/categories',
            // 'admin/shipping-area',
            // 'admin/products',
            // 'admin/banner',
            // 'admin/coupons',
            // 'admin/language-settings/language',
            // 'admin/blogs',
            // 'admin/google_analytics',
            // 'admin/pos',
            // 'admin/products',
        ];

        foreach ($collection as $route) {
            // $this->info($route->getPrefix());

            if ( in_array($route->getPrefix() ,$included_routes )    ) {
            // $this->info($route->getPrefix());

                $routePrefix = $route->getPrefix();
                $routeName = $route->getName();

                $routePrefixPartials = explode('/', $routePrefix);
                $routeNamePartials = explode('.', $routeName);

                $page = $routePrefixPartials[1];
                $action = $routeNamePartials[0];
                // dd($routePrefix,$routeName, $page , $action);
                $bar->advance();

                if ($page && $action) {

                    switch (true) {
                        case in_array($action, ['all','index','show']):
                            $permissions[$page . '_view'] = [
                                'page' => $page,
                                'action' => 'view',
                                'name' => $page . ' view',
                                // 'guard_name' => 'sanctum',
                                'guard_name' => 'web',
                            ];

                            break;

                        // case in_array($action, ['create', 'store']):
                        //     $permissions[$page . '_create'] = [
                        //         'page' => $page,
                        //         'action' => 'create',
                        //         'name' => $page . ' create',
                        //         // 'guard_name' => 'sanctum',
                        //         'guard_name' => 'web',
                        //     ];
                        //     break;

                        // case in_array($action, ['edit', 'update']):
                        //     $permissions[$page . '_edit'] = [
                        //         'page' => $page,
                        //         'action' => 'edit',
                        //         'name' => $page . ' edit',
                        //         // 'guard_name' => 'sanctum',
                        //         'guard_name' => 'web',
                        //     ];
                        //     break;

                        // case in_array($action, ['delete','destroy']):
                        //     $permissions[$page . '_delete'] = [
                        //         'page' => $page,
                        //         'action' => 'delete',
                        //         'name' => $page . ' delete',
                        //         // 'guard_name' => 'sanctum',
                        //         'guard_name' => 'web',
                        //     ];
                        //     break;

                        default:
                            // $permissions[$page . '_' . $action] = [
                            //     'page' => $page,
                            //     'action' => $action,
                            //     'name' => $page . ' ' . $action,
                            //     // 'guard_name' => 'sanctum',
                            //     'guard_name' => 'web',
                            // ];
                            break;
                    }
                    $routes[] = $routeName;

                }
            }

        }
        $bar->finish();

        
        foreach ($permissions as $permission) {

            Permission::updateOrCreate(
                [
                    'name' => $permission['name'],
                    'guard_name' => $permission['guard_name'],
                ],
                $permission
            );

        }

        $this->info('Synchronizing routes of admin portal finished successfully');
    }

    private function createSuperAdminRole()
    {
        $this->info("Starting super admin Role synchronizing...");

        $superAdmin = Role::updateOrCreate([
            'name' => 'super admin',
            'guard_name' => 'web',
        ]);
        $permission_array =  Permission::pluck('name')->toArray();
        foreach ($permission_array as $key => $value) {
            $this->info($value);
        }

        $superAdmin->syncPermissions($permission_array);
    }



}
