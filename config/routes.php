<?php

/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/*
 * This file is loaded in the context of the `Application` class.
  * So you can use  `$this` to reference the application class instance
  * if required.
 */

return function (RouteBuilder $routes): void {
    /*
     * The default class to use for all routes
     *
     * The following route classes are supplied with CakePHP and are appropriate
     * to set as the default:
     *
     * - Route
     * - InflectedRoute
     * - DashedRoute
     *
     * If no call is made to `Router::defaultRouteClass()`, the class used is
     * `Route` (`Cake\Routing\Route\Route`)
     *
     * Note that `Route` does not do any inflections on URLs which will result in
     * inconsistently cased URLs when used with `{plugin}`, `{controller}` and
     * `{action}` markers.
     */
    $routes->setRouteClass(DashedRoute::class);

    // My admin routes
    $routes->prefix('admin', function (RouteBuilder $routes) {
        $routes->connect('/', ['controller' => 'Dashboards', 'action' => 'index']);

        // college routes
        $routes->connect('/add-college', ['controller' => 'Colleges', 'action' => 'addCollege']);
        $routes->connect('/list-colleges', ['controller' => 'Colleges', 'action' => 'listCollege']);
        $routes->connect('/edit-college/:id', ['controller' => 'Colleges', 'action' => 'editCollege'], ['pass' => ['id']]);
        $routes->connect('/delete-college/:id', ['controller' => 'Colleges', 'action' => 'deleteCollege'], ['pass' => ['id']]);

        // branch routes
        $routes->connect('/add-branch', ['controller' => 'Branches', 'action' => 'addBranch']);
        $routes->connect('/list-branches', ['controller' => 'Branches', 'action' => 'listBranch']);
        $routes->connect('/edit-branch/:id', ['controller' => 'Branches', 'action' => 'editBranch'], ['pass' => ['id']]);
        $routes->connect('/delete-branch/:id', ['controller' => 'branches', 'action' => 'deleteBranch'], ['pass' => ['id']]);

        // student routes
        $routes->connect('/add-student', ['controller' => 'Students', 'action' => 'addStudent']);
        $routes->connect('/list-students', ['controller' => 'Students', 'action' => 'listStudent']);
        $routes->connect('/edit-student/:id', ['controller' => 'Students', 'action' => 'editStudent'], ['pass' => ['id']]);
        $routes->connect('/delete-student/:id', ['controller' => 'Students', 'action' => 'deleteStudent'], ['pass' => ['id']]);

        // staff routes
        $routes->connect('/add-staff', ['controller' => 'Staffs', 'action' => 'addStaff']);
        $routes->connect('/list-staffs', ['controller' => 'Staffs', 'action' => 'listStaff']);
        $routes->connect('/edit-staff/:id', ['controller' => 'Staffs', 'action' => 'editStaff'], ['pass' => ['id']]);
        $routes->connect('/delete-staff/:id', ['controller' => 'Staffs', 'action' => 'deleteStaff'], ['pass' => ['id']]);

        // report routes
        $routes->connect('/college-report', ['controller' => 'Reports', 'action' => 'collegesReport']);
        $routes->connect('/student-report', ['controller' => 'Reports', 'action' => 'studentsReport']);
        $routes->connect('/staff-report', ['controller' => 'Reports', 'action' => 'staffsReport']);

        $routes->connect('/allot-college', ['controller' => 'Students', 'action' => 'getCollegeBranches']);
    });

    $routes->scope('/', function (RouteBuilder $builder): void {
        /*
         * Here, we are connecting '/' (base path) to a controller called 'Pages',
         * its action called 'display', and we pass a param to select the view file
         * to use (in this case, templates/Pages/home.php)...
         */
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        /*
         * ...and connect the rest of 'Pages' controller's URLs.
         */
        $builder->connect('/pages/*', 'Pages::display');

        /*
         * Connect catchall routes for all controllers.
         *
         * The `fallbacks` method is a shortcut for
         *
         * ```
         * $builder->connect('/{controller}', ['action' => 'index']);
         * $builder->connect('/{controller}/{action}/*', []);
         * ```
         *
         * You can remove these routes once you've connected the
         * routes you want in your application.
         */
        $builder->fallbacks();
    });

    /*
     * If you need a different set of middleware or none at all,
     * open new scope and define routes there.
     *
     * ```
     * $routes->scope('/api', function (RouteBuilder $builder): void {
     *     // No $builder->applyMiddleware() here.
     *
     *     // Parse specified extensions from URLs
     *     // $builder->setExtensions(['json', 'xml']);
     *
     *     // Connect API actions here.
     * });
     * ```
     */
};
