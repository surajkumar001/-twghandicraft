<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Artnhub/index';
$route['index'] = 'Artnhub/index';
$route['contact'] = 'Artnhub/contact';
$route['faq'] = 'Artnhub/faq';
$route['termsandconditions'] = 'Artnhub/termsandconditions';
$route['returnpolicy'] = 'Artnhub/returnpolicy';
$route['shoppingguide'] = 'Artnhub/shoppingguide';
$route['about'] = 'Artnhub/about';
$route['cart'] = 'Artnhub/cart';
$route['production_cart'] = 'Artnhub/production_cart';
$route['checkout'] = 'Artnhub/checkouts';
$route['profile'] = 'Artnhub/profile';
$route['my_ledger'] = 'Artnhub/my_ledger';
$route['manage_address'] = 'Artnhub/manage_address';
$route['wishlist'] = 'Artnhub/wishlist';
$route['notification'] = 'Artnhub/notification';
$route['orders'] = 'Artnhub/orders';
$route['forgot'] = 'Artnhub/forgot';
$route['changemobile'] = 'Artnhub/changemobile';
$route['changemobileverify'] = 'Artnhub/changemobileverify';
$route['otpverify'] = 'Artnhub/otpverify';
$route['pcat'] = 'Artnhub/pcat';
$route['logout'] = 'Artnhub/logout';
$route['Admin'] = 'Admin/index';

$route['uploadslip'] = 'Artnhub/uploadslip';
$route['underverification'] = 'Artnhub/underverification';
$route['thankyou'] = 'Artnhub/thankyou';
$route['user_order_detail'] = 'Artnhub/user_order_detail';
$route['New_Arrival'] = 'Artnhub/New_Arrival';
$route['user_login'] = 'Artnhub/user_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'Artnhub/user_login';
$route['signup'] = 'Artnhub/signup';
$route['(:any)'] = 'Artnhub/product/(:any)';
$route['ps/(:any)'] = 'Artnhub/products/(:any)';
$route['pcat/(:any)'] = 'Artnhub/pcat/(:any)';
$route['pcatnew/(:any)'] = 'Artnhub/pcatnew/(:any)';
$route['returngift/(:any)'] = 'Artnhub/returngift/(:any)';
$route['subcat/(:any)'] = 'Artnhub/subcat/(:any)';
$route['newsubcat/(:any)'] = 'Artnhub/newsubcat/(:any)';
$route['(:any)/cat'] = 'Artnhub/cat/(:any)';
$route['newcat/(:any)'] = 'Artnhub/newcat/(:any)';
$route['personlizedgift/(:any)'] = 'Artnhub/personlizedgift/(:any)';
$route['viewss/(:any)'] = 'Artnhub/viewss/(:any)';
$route['newviewss/(:any)'] = 'Artnhub/newviewss/(:any)';
$route['views/(:any)'] = 'Artnhub/views/(:any)';
$route['view/(:any)'] = 'Artnhub/view/(:any)';
$route['new_view/(:any)'] = 'Artnhub/new_view/(:any)';
$route['gift/(:any)'] = 'Artnhub/gift/(:any)';
$route['New_Arrival'] = 'Artnhub/New_Arrival';


$route['barfilter'] = 'Artnhub/barfilter';
$route['underverification'] = 'Artnhub/underverification';
$route['user_login'] = 'Artnhub/user_login';
$route['thankyou'] = 'Artnhub/thankyou';
$route['production_checkouts'] = 'Artnhub/production_checkouts';
$route['my_ledger'] = 'Artnhub/my_ledger';
$route['ledger_details'] = 'Artnhub/ledger_details';
$route['user_order_detail'] = 'Artnhub/user_order_detail';
$route['otpcheck'] = 'Artnhub/otpcheck';
