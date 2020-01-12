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
|	http://codeigniter.com/user_guide/general/routing.html
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

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['default_controller'] = 'Home/index';

/* Search Product */
$route['search'] = "Home/search";

/* Account Registration & Login */
$route['login'] = 'Login';
$route['logout'] = 'Login/logout';
$route['register'] = 'Register';
$route['account'] = 'account/view';
$route['register/verification'] = 'Register/input';
$route['verification'] = 'Home/index';

/* User Profile Part */
$route['profile/transaction'] = 'Profile/transaction';
$route['profile/myprofile'] = 'Profile/myprofile';
$route['profile/history/:any'] = 'Profile/history';

/* Reset Password Part */
$route['profile/forgot_password'] = 'Login/forgot_password';
$route['profile/forgot_password/completed'] = 'Login/completeResetPassword';
$route['profile/reset'] = 'ResetPassword';

$route['home'] = 'Home/index';
$route['about-us'] = 'Home/AboutUs';
$route['privacy'] = 'Home/privacy';
$route['contacts'] = 'Home/contactus';
$route['faq'] = 'Home/faq';
$route['terms'] = 'Home/terms';
$route['how-to'] = 'Home/howto';
$route['categories'] = 'Home/categories';

/* Shopping Cart Part */
$route['cart/checkout'] = 'Checkout/index';
$route['cart/addtocart'] = 'Cart/addtocart';
$route['order/success'] = 'Checkout/checkoutSuccess';
$route['order/payment'] = 'Profile/orderPayment';
$route['order/confirmation'] = 'Profile/manualVerification';
$route['payment/confirmation'] = 'PaymentProcess/confirmationPage';

/* CMS Part */
$route['cms'] = 'CMS';
$route['cms/login'] = 'CMS';
$route['cms/dashboard'] = 'CMS/dashboard';
$route['cms/banner'] = 'Banner_cms';
$route['cms/member'] = 'Member_cms';
$route['cms/about'] = 'About_cms';
$route['cms/contact'] = 'Contact_cms';
$route['cms/terms'] = 'Terms_cms';
$route['cms/faq'] = 'Faq_cms';
$route['cms/privacy'] = 'Privacy_cms';
$route['cms/orders'] = 'Orders_cms';
$route['cms/margin'] = 'Margin_cms';
$route['cms/howto'] = 'Howto_cms';
$route['cms/orders/status'] = 'Orders_cms/status';

/* ROUTES FOR PROCESS */
$route['addcart'] = 'Cart/addtocart';

/* Basic Part */
$route['change_pass'] = 'cpassword/view';
$route['product']= 'product/view';
$route['product_detail']= 'product_detail/view';
$route['mycart']= 'Cart/mycart';
$route['register_success']= 'page_success/register_success';
$route['preorder_success']= 'page_success/preorder_success';
$route['forgot_pass_success']= 'page_success/forgot_pass_success';
$route['verify']= 'page_success/verify';
$route['history_order']= 'history_order/view';
