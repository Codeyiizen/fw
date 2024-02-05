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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'favoritewish/index';
//$route['^(?!other|controller).*'] = 'favoritewish/$0'; // To remove "welcome" default controller name from url
$route['404_override'] = 'favoritewish';
$route['translate_uri_dashes'] = FALSE;


$route['administrator'] = 'favoritewish/administrator';
$route['admin_signout'] = 'favoritewish/adminSignout';
$route['admin_fpassword'] = 'favoritewish/admin_forgot_password';

$route['sign-up'] = 'favoritewish/register';
$route['sign-in'] = 'favoritewish/login';
$route['user-dashboard'] = 'favoritewish/user_dashboard';
$route['user-profile'] = 'favoritewish/user_profile';
$route['setting'] = 'favoritewish/changepwd';
$route['user-profile/edit'] = 'favoritewish/edit';
$route['forgot-password'] = 'favoritewish/forgotpassword';
$route['profile/postyourads'] = 'favoritewish/postyourads';
$route['export_cf_data'] = 'favoritewish/export_cf_inquiry';

$route['about-us'] = 'favoritewish/aboutus';
$route['contact-us'] = 'favoritewish/contactus';
$route['terms-and-conditions'] = 'favoritewish/termsandconditions';
$route['user/profile'] = 'favoritewish/getUserProfile';
$route['user/friends'] = 'favoritewish/getUserFriends';
$route['user/friends/requests'] = 'favoritewish/getUserFriends';
$route['user/friends/search'] = 'favoritewish/getUserFriendsSearch';

/*


$route['inquiry_list'] = 'hangartrader/cf_inquiry_list';
$route['inquiry_details/(:any)'] = 'hangartrader/cf_inquiry_list_details/$1';
$route['users_list'] = 'hangartrader/admin_users_list';
$route['user_details/(:any)'] = 'hangartrader/admin_users_details/$1';

$route['add_reviews'] = 'hangartrader/admin_reviews';
$route['all-reviews'] = 'hangartrader/admin_reviews_list';
$route['reviews_details/(:any)'] = 'hangartrader/admin_reviews_details/$1';
$route['reviews_delete/(:num)'] = 'hangartrader/admin_reviews_delete/$1';
$route['edit_reviews/(:num)'] = 'hangartrader/admin_reviews_edit/$1';

$route['admin-waiting-list'] = 'hangartrader/admin_waiting_listing';

$route['states'] = 'hangartrader/states_list';
$route['add_state'] = 'hangartrader/add_state';
$route['edit_state/(:num)'] = 'hangartrader/edit_state/$1';
$route['delete_state/(:num)'] = 'hangartrader/delete_state/$1';

$route['ads-type'] = 'hangartrader/ads_type_list';
$route['add_ads_type'] = 'hangartrader/add_ads_type';
$route['edit_ads_type/(:num)'] = 'hangartrader/edit_ads_type/$1';
$route['delete_ads_type/(:num)'] = 'hangartrader/delete_ads_type/$1';

$route['advertiser'] = 'hangartrader/advertiser';
$route['add_advertiser'] = 'hangartrader/add_advertiser';
$route['edit_advertiser/(:num)'] = 'hangartrader/edit_advertiser/$1';
$route['delete_advertiser/(:num)'] = 'hangartrader/delete_advertiser/$1';

$route['find-hangars'] = 'hangartrader/findhangar';
$route['hangar-details/(:any)'] = 'hangartrader/hangardetails/$1';

$route['admin-hangars-list'] = 'hangartrader/admin_hangars_list';
$route['admin-hangar-details/(:any)'] = 'hangartrader/admin_hangar_details/$1';
$route['admin-hangars-delete/(:num)'] = 'hangartrader/admin_hangars_delete/$1';
$route['admin-hangars-edit/(:num)'] = 'hangartrader/admin_hangars_edit/$1';



$route['services'] = 'hangartrader/services';
$route['resources'] = 'hangartrader/resources';
$route['blog'] = 'hangartrader/blog';
$route['faq'] = 'hangartrader/faq';

$route['testimonials'] = 'hangartrader/testimonials';
$route['thankyou'] = 'hangartrader/thankyou';
$route['join-hangar-waiting-list'] = 'hangartrader/joinwaitinglist';
$route['auction'] = 'hangartrader/auction';
$route['escrow'] = 'hangartrader/escrow';
$route['direct-email'] = 'hangartrader/directemail';
$route['brokerage'] = 'hangartrader/brokerage';




*/
