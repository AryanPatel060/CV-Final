<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('login', 'Login::index');
$routes->get('signup', 'Signup::index');
$routes->get('logout','Login::logout');
$routes->get('getachivment','Addachivment::getachivment');
$routes->get('adminlogin', 'Adminlogin::index');
$routes->get('adminlogout','Adminlogin::adminlogout');
$routes->get('adminpanel','Adminpanel::index');
$routes->get('Pdf','Pdf::index');
$routes->get('profile','Profile::index');
$routes->get('addachivment','Addachivment::index');
$routes->get('header','Header::index');






$routes->get('makepdf', 'PdfController::index');
$routes->match(['get', 'post'], 'makepdf', 'PdfController::htmlToPDF');


$routes->post('signup', 'Signup::signup');
$routes->post('login', 'Login::login');
$routes->post('addachivment', 'Addachivment::addachivment');
$routes->post('catagory', 'Catagory::index');
$routes->post('achivmentview', 'Achivmentview::index');
$routes->post('adminlogin', 'Adminlogin::adminlogin');
$routes->post('addfaculty', 'Addfaculty::index');
$routes->post('aproove', 'Achivmentview::aproove');
$routes->post('undoaproove', 'Achivmentview::undoaproove');
$routes->post('addcat', 'Catagory::addcat');
$routes->post('editcat', 'Catagory::editcat');
$routes->post('deletecat', 'Catagory::deletecat');
$routes->post('deleteachivment', 'Addachivment::deleteachivment');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
