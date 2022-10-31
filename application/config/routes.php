<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// HOME
$route['home'] = 'home';
$route['about'] = 'home/about';
$route['partnership-sponshorship'] = 'home/partnership_sponshorship';
$route['eligible-countries'] = 'home/eligible_countries';
$route['help-center'] = 'home/helpCenter';
$route['faq'] = 'home/faq';
$route['announcements'] = 'announcements';
$route['announcements/(:any)'] = 'announcements/detail/$1';

// AUTHENTICATION PROCESS
$route['sign-in'] = 'authentication';
$route['sign-up'] = 'authentication/signUp';
$route['sign-out'] = 'authentication/logout';
$route['verification-email'] = 'authentication/verificationEmail';
$route['forgot-password'] = 'authentication/forgotPassword';
$route['reset-password/(:any)'] = 'authentication/ubah_password/$1';

// USER
$route['user'] = 'user';
$route['user/overview'] = 'user';
$route['user/entry-paper'] = 'user/entryPaper';
$route['user/settings'] = 'user/settings';

// ADMIN
$route['admin'] = 'admin';
$route['admin/dashboard'] = 'admin';
$route['admin/statistics'] = 'admin/statistics';
$route['admin/participans'] = 'admin/participans';
$route['admin/participans/(:any)'] = 'admin/participans_detail/$1';
$route['master/announcements'] = 'master/manageList';
$route['master/faq'] = 'master/faq';
$route['master/master-faq'] = 'master/masterFaq';
$route['master/payment-batch'] = 'master/paymentBatch';
$route['master/entrant-form'] = 'master/entrantForm';
$route['admin/settings'] = 'admin/settings';

// PAYMENTS

$route['default_controller'] = 'home';
$route['404_override'] = 'home/e_404';
$route['translate_uri_dashes'] = TRUE;
