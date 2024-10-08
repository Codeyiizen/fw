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
$route['default_controller'] = 'favoritewish/login';
//$route['^(?!other|controller).*'] = 'favoritewish/$0'; // To remove "welcome" default controller name from url
$route['404_override'] = 'favoritewish';
$route['translate_uri_dashes'] = FALSE;


$route['administrator'] = 'favoritewish/administrator';
$route['admin_signout'] = 'favoritewish/adminSignout';
$route['admin_fpassword'] = 'favoritewish/admin_forgot_password';
$route['admin/user/list'] = 'favoritewish/adminUserList';
$route['admin/user/list/(:num)'] = 'favoritewish/adminUserList';
$route['admin/user/status/change'] = 'favoritewish/adminUserActiveStatusChange';
$route['admin/home/page/dynamic'] = 'favoritewish/adminHomePageDynamic';
$route['admin/home/page/dynamic/post'] = 'favoritewish/adminHomePageDynamicPost';
$route['admin/home/page/dynamic/post/(:num)'] = 'favoritewish/adminHomePageDynamicPost';
$route['admin/aboutus/page/dynamic'] = 'favoritewish/adminAboutUsPageDynamic';
$route['admin/aboutus/page/dynamic/post'] = 'favoritewish/adminAboutUsPageDynamicPost';
$route['admin/aboutus/page/dynamic/post/(:num)'] = 'favoritewish/adminAboutUsPageDynamicPost';
$route['admin/contact/page/dynamic'] = 'favoritewish/adminContactPageDynamic';
$route['admin/contact/page/dynamic/post'] = 'favoritewish/adminContactPageDynamicPost';
$route['admin/contact/page/dynamic/post/(:num)'] = 'favoritewish/adminContactPageDynamicPost';

$route['sign-up'] = 'favoritewish/register';
$route['sign-in'] = 'favoritewish/login';
$route['user-dashboard'] = 'favoritewish/user_dashboard';
$route['user-profile'] = 'favoritewish/user_profile';
$route['setting'] = 'favoritewish/changepwd';
$route['notification'] = 'favoritewish/notification';
$route['user-profile/edit'] = 'favoritewish/edit';
$route['forgot-password'] = 'favoritewish/forgotpassword';
$route['profile/postyourads'] = 'favoritewish/postyourads';
$route['export_cf_data'] = 'favoritewish/export_cf_inquiry';

$route['about-us'] = 'favoritewish/aboutus';
$route['contact-us'] = 'favoritewish/contactus';
$route['terms-and-conditions'] = 'favoritewish/termsandconditions';
$route['user/profile'] = 'favoritewish/getUserProfile';
$route['user/friends'] = 'favoritewish/getUserFriends';
$route['user/friends/requests'] = 'favoritewish/getUserPendingFriends';
$route['user/friends/search'] = 'favoritewish/getUserFriendsSearch';
$route['user/friends/request'] = 'favoritewish/sendFriendsRequest';
$route['user/friends/accept'] = 'favoritewish/acceptFriendsRequest';
$route['user/friends/remove'] = 'favoritewish/removeFriendsRequest';
$route['user/add/wish'] = "favoritewish/addYourWish";
$route['user/friends/details/(:num)'] = 'favoritewish/getUserFriendsDetails/$1';
$route['user/friends/detail/(:num)/wish'] = 'favoritewish/getwishlist/$1'; 
$route['user/friends/detail/(:num)/registry'] = 'favoritewish/getregistrylist/$1'; 
$route['getSubCat'] = 'favoritewish/getSubCat'; 
$route['user/registry'] = 'favoritewish/user_registry'; 
$route['user/add/registry'] = "favoritewish/addRegistry";  
$route['user/friends/(:num)/massages'] = 'favoritewish/getMessagelist/$1'; 
$route['user/friends/(:num)/familywish'] = 'favoritewish/getFamilyWish/$1'; 
$route['user/test'] = 'favoritewish/test';
$route['user/family/request'] = 'favoritewish/familyRequest';
$route['user/account/remove'] = 'favoritewish/userAccountRemove';
$route['getSubCat/Cat_id'] = 'favoritewish/getSubCat_cat_id';
$route['getSubCat/Cat_id/post'] = 'favoritewish/wishEditPost'; 
$route['wish/delete'] = 'favoritewish/wishDelete'; 
$route['getCategory/subcategory/registry_id'] = 'favoritewish/getCategorySucategory_registry_id';
$route['registry/update/post'] = 'favoritewish/registryEditPost';
$route['registry/delete'] = 'favoritewish/registryDelete';   
$route['google/sign-in'] = 'favoritewish/googleLogin';
$route['show/placeholder'] = 'favoritewish/showPlaceHolderBycatName';
$route['show/placeholder/edit'] = 'favoritewish/showPlaceHolderBycatNameEdit';
$route['family/wishes'] = 'favoritewish/family_wishes'; 
$route['family/wishes/add'] = "favoritewish/addFamilyAdd"; 
$route['google/sign-up'] = 'favoritewish/googleSignUp';
$route['getCategory/subcategory/family_wishid'] = 'favoritewish/getCategorySucategory_familywish_id';
$route['familywish/update/post'] = 'favoritewish/familyWishEditPost';
$route['familywish/delete'] = 'favoritewish/familyWishDelete';  
$route['save/emoji'] = 'favoritewish/saveEmojii'; 
$route['send/email'] = 'favoritewish/sendEmail';
$route['send/email/unsubscribe'] = 'favoritewish/sendEmailStatusChange';
$route['home/page'] = 'favoritewish/index';
$route['privacy/Policy'] = 'favoritewish/privacyPolicy';
$route['user/friends/notyfy/read'] = 'favoritewish/friendNotyfyRead';
$route['user/birthday/status/update'] = 'favoritewish/birthdayStateUpdate';
$route['user/birthday/status/toupdate'] = 'favoritewish/birthdayTOStateUpdate';
$route['user/friends/birthday'] = 'favoritewish/userFriendsBirthday';
$route['update/massage/status'] = 'favoritewish/updateMassageStatusById';
$route['user/notification/realall'] = 'favoritewish/userNotifiReadAll';

$route['user/notification/read'] = 'favoritewish/userNotifyRead';
$route['user/notification/delete'] = 'favoritewish/userNotifyDelete';
$route['check/friend/birthday'] = 'favoritewish/checkFriendBirthday';


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
