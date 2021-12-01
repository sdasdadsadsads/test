<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.



$routes->get('/', 'auth::index');
$routes->get('/emergency', 'emergency::index');
$routes->post('/callEmergency', 'emergency::callEmergency');
$routes->get('/permission_denied', 'admin::permission_denied');

$routes->group('auth', function ($routes) {
	$routes->post('auth', 'auth::auth');
	$routes->post('auth2FT', 'auth::auth2FT');
	$routes->get('scan2FT', 'auth::scan2FT',  ['filter' => 'scan2FT']);
	$routes->post('scan_auth2FT', 'auth::scan_auth2FT',  ['filter' => 'scan2FT']);
	$routes->get('logout', 'auth::logout');
});

$routes->group('admin', function ($routes) {

	$routes->get('getGroup', 'admin::get_group_admin',  ['filter' => 'auth']);
	$routes->get('show', 'admin::index',  ['filter' => 'auth', 'filter' => 'isPermission:2,5,7']);
	$routes->get('permissions_get/(:num)', 'admin::permissions_get/$1',  ['filter' => 'auth']);

	$routes->post('create_admin', 'admin::create_admin',  ['filter' => 'auth']);
	$routes->post('edit_permissions', 'admin::edit_permissions',  ['filter' => 'auth']);
	$routes->post('edit_round', 'admin::edit_round',  ['filter' => 'auth']);
	$routes->post('edit_pass', 'admin::edit_pass',  ['filter' => 'auth']);

	$routes->get('delete_admin/(:num)', 'admin::delete_admin/$1',  ['filter' => 'auth']);
	$routes->get('edit_status/(:num)', 'admin::edit_status/$1',  ['filter' => 'auth']);


	$routes->get('permissionsdata_get/(:num)', 'admin::permissionsdata_get/$1',  ['filter' => 'auth']);
	$routes->post('edit_dataadmin', 'admin::edit_dataadmin',  ['filter' => 'auth']);


	$routes->get('reset2FT/(:segment)', 'admin::reset2FT/$1',  ['filter' => 'auth']);
});

$routes->group('manage_sale', function ($routes) {
	$routes->get('/', 'manage_sale::index',  ['filter' => 'auth']);
	$routes->post('registration', 'manage_sale::registration',  ['filter' => 'auth']);
	$routes->post('listMember', 'manage_sale::list_member_of_sale',  ['filter' => 'auth']);
});


$routes->group('report_player', function ($routes) {

	$routes->get('show', 'report_player::index',  ['filter' => 'auth', 'filter' => 'isPermission:1,7,4']);
	$routes->post('filter', 'report_player::filter',  ['filter' => 'auth']);
	$routes->post('filter_deposit_id', 'report_player::filter_deposit_id',  ['filter' => 'auth']);
	$routes->post('filter_withdraw_id', 'report_player::filter_withdraw_id',  ['filter' => 'auth']);
	$routes->get('user_id/(:num)', 'report_player::user_id/$1',  ['filter' => 'auth']);
	$routes->post('user_edit', 'report_player::user_edit',  ['filter' => 'auth']);
	$routes->get('resetPass/(:num)', 'report_player::resetPass/$1',  ['filter' => 'auth']);
});

$routes->group('dashboard', function ($routes) {
	$routes->get('show', 'dashboard::index',  ['filter' => 'auth', 'filter' => 'isPermission:1,1']);
	$routes->post('filter', 'dashboard::filter',  ['filter' => 'auth']);
});

$routes->group('confirmCredit', function ($routes) {
	$routes->get('show', 'confirmCredit::confirmCredit',  ['filter' => 'auth', 'filter' => 'isPermission:1,2']);
	$routes->post('CheckUserBeforeConfirm', 'confirmCredit::CheckUserBeforeConfirm', ['filter' => 'auth']);
	$routes->post('confirmAddCredit', 'confirmCredit::confirmAddCredit', ['filter' => 'auth']);
	$routes->post('confirmAndDelBonus', 'confirmCredit::confirmAndDelBonus', ['filter' => 'auth']);
	$routes->post('hideDepositUnconfirmed', 'confirmCredit::hideDepositUnconfirmed', ['filter' => 'auth']);
	$routes->post('filterTypeStatement', 'confirmCredit::filterTypeStatement', ['filter' => 'auth']);
	$routes->post('getusername', 'confirmCredit::getusername', ['filter' => 'auth']);
	$routes->post('find_new_items', 'confirmCredit::find_new_items', ['filter' => 'auth']);
	$routes->post('check_status_change', 'confirmCredit::check_status_change', ['filter' => 'auth']); 
	$routes->post('checkStatusNotwait', 'confirmCredit::checkStatusNotwait', ['filter' => 'auth']); 
});


$routes->group('editProblem', function ($routes) {

	$routes->get('show', 'editProblem::index',  ['filter' => 'auth', 'filter' => 'isPermission:2,10,35']);
	$routes->post('showDataUser', 'editProblem::showDataUser',  ['filter' => 'auth']);
	$routes->post('addCredit', 'editProblem::addCredit',  ['filter' => 'auth']);
	$routes->post('ReduceCredit', 'editProblem::ReduceCredit',  ['filter' => 'auth']);
	$routes->post('filter', 'editProblem::filter', ['filter' => 'auth']);
});


$routes->group('safecode', function ($routes) {

	$routes->get('show', 'safecode::index', ['filter' => 'auth', 'filter' => 'isPermission:2,5,8']);
	$routes->get('save_safecode/(:num)', 'safecode::save_safecode/$1',  ['filter' => 'auth']);
	$routes->get('delete_safecode/(:num)', 'safecode::delete_safecode/$1',  ['filter' => 'auth']);
	$routes->get('open_statussafe/(:num)', 'safecode::open_statussafe/$1',  ['filter' => 'auth']);
	$routes->get('close_statussafe/(:num)', 'safecode::close_statussafe/$1',  ['filter' => 'auth']);
});


$routes->group('work_time', function ($routes) {

	$routes->get('show', 'work_time::index', ['filter' => 'auth', 'filter' => 'isPermission:2,5,9']);
	$routes->post('cre_rounds', 'work_time::cre_rounds',  ['filter' => 'auth']);

	$routes->get('rounds_getid/(:num)', 'work_time::rounds_getid/$1',  ['filter' => 'auth']);
	$routes->post('update_rounds', 'work_time::update_rounds',  ['filter' => 'auth']);
});


$routes->group('withdraw_setting', function ($routes) {
	$routes->get('show', 'withdraw_setting::index',  ['filter' => 'auth', 'filter' => 'isPermission:2,6,15']);
	$routes->post('setWD', 'withdraw_setting::setWD',  ['filter' => 'auth']);
});


$routes->group('registration_user', function ($routes) {
	$routes->get('show', 'registration_user::index',  ['filter' => 'auth', 'filter' => 'isPermission:1,4,1']);
	$routes->post('create', 'registration_user::create',  ['filter' => 'auth']);
});



$routes->group('report_otp', function ($routes) {
	$routes->get('show', 'report_otp::index',  ['filter' => 'auth', 'filter' => 'isPermission:1,11,33']);
	$routes->get('confrim/(:num)', 'report_otp::confrim/$1',  ['filter' => 'auth']);
	$routes->post('filter', 'report_otp::filter', ['filter' => 'auth']);
});

$routes->group('report_activity_logs', function ($routes) {
	$routes->get('show', 'report_activity_logs::index',  ['filter' => 'auth', 'filter' => 'isPermission:2,11,47']);
	$routes->post('filter', 'report_activity_logs::filter', ['filter' => 'auth']);
	$routes->post('csv', 'report_activity_logs::csv',  ['filter' => 'auth']);
});


$routes->group('report_pointandspin', function ($routes) {
	$routes->get('show', 'report_pointandspin::index',  ['filter' => 'auth', 'filter' => 'isPermission:1,8,28']);
	$routes->get('show_id/(:num)', 'report_pointandspin::show_id/$1',  ['filter' => 'auth']);
	$routes->post('filter', 'report_pointandspin::filter',  ['filter' => 'auth']);
});


$routes->group('spin', function ($routes) {
	$routes->get('show', 'spin::index',  ['filter' => 'auth']);
});

$routes->group('bank_auto', function ($routes) {
	$routes->get('show', 'bank_auto::index',  ['filter' => 'auth', 'filter' => 'isPermission:2,6,11']);
	$routes->post('createBankAuto', 'bank_auto::createBankAuto',  ['filter' => 'auth']);
	$routes->post('editBankAuto', 'bank_auto::editBankAuto',  ['filter' => 'auth']);
	$routes->post('changeStatusBank', 'bank_auto::changeStatusBank',  ['filter' => 'auth']);
	$routes->get('bank_setting', 'bank_auto::bank_setting',  ['filter' => 'auth', 'filter' => 'isPermission:2,6,13']);
	$routes->post('addgroupByuser', 'bank_auto::addgroupByuser',  ['filter' => 'auth']);
	$routes->post('changeStatusProcesslist', 'bank_auto::changeStatusProcesslist',  ['filter' => 'auth']);
});



$routes->group('promotion', function ($routes) {
	$routes->get('acceptPromoManual', 'promotion::acceptPromoManual',  ['filter' => 'auth', 'filter' => 'isPermission:2,7,21']);
	$routes->post('acceptPromoManual_execute', 'promotion::acceptPromoManual_execute',  ['filter' => 'auth']);
	$routes->get('show', 'promotion::index',  ['filter' => 'auth', 'filter' => 'isPermission:2,7,20']);
	$routes->post('promotions', 'promotion::promotions',  ['filter' => 'auth']);
	$routes->get('promotions_get/(:num)', 'promotion::promotions_get/$1',  ['filter' => 'auth', 'filter' => 'isPermission:2,7,20']);
	$routes->post('promotions_id', 'promotion::promotions_id',  ['filter' => 'auth']);
	$routes->post('filter', 'promotion::filter',  ['filter' => 'auth']);
});



$routes->group('report_deposit', function ($routes) {
	$routes->get('show', 'report_deposit::index',  ['filter' => 'auth', 'filter' => 'isPermission:1,11,36']);
	$routes->post('filter', 'report_deposit::filter',  ['filter' => 'auth']);
	$routes->post('csv', 'report_deposit::csv',  ['filter' => 'auth']);
});

$routes->group('report_withdraw', function ($routes) {
	$routes->get('show', 'report_withdraw::index',  ['filter' => 'auth', 'filter' => 'isPermission:1,11,37']);
	$routes->post('filter', 'report_withdraw::filter',  ['filter' => 'auth']);
	$routes->post('csv', 'report_withdraw::csv',  ['filter' => 'auth']);
});


$routes->group('report_deposit_decimal', function ($routes) {
	$routes->get('show', 'report_deposit_decimal::index',  ['filter' => 'auth', 'filter' => 'isPermission:1,11,40']);
	$routes->post('filter', 'report_deposit_decimal::filter',  ['filter' => 'auth']);
	$routes->post('csv', 'report_deposit_decimal::csv',  ['filter' => 'auth']);
});


$routes->group('report_first_deposit', function ($routes) {
	$routes->get('show', 'report_first_deposit::index', ['filter' => 'auth', 'filter' => 'isPermission:1,11,39']);
	$routes->post('filter', 'report_first_deposit::filter',  ['filter' => 'auth']);
	$routes->post('csv', 'report_first_deposit::csv',  ['filter' => 'auth']);
});


$routes->group('report_promotion', function ($routes) {
	$routes->get('show', 'report_promotion::index',  ['filter' => 'auth', 'filter' => 'isPermission:2,7,20']);
	$routes->post('cancelPromotion', 'report_promotion::cancelPromotion',  ['filter' => 'auth']);
	$routes->post('filter', 'report_promotion::filter',  ['filter' => 'auth']);
	$routes->post('csv', 'report_promotion::csv',  ['filter' => 'auth']);
});

$routes->group('withdraw', function ($routes) {
	$routes->get('show', 'withdraw::index',  ['filter' => 'auth', 'filter' => 'isPermission:1,3']);
	$routes->get('get_bankweb_balanace', 'withdraw::get_bankweb_balanace',  ['filter' => 'auth']);
	$routes->post('see_withdraw', 'withdraw::see_withdraw',  ['filter' => 'auth']);
	$routes->post('get_bankweb', 'withdraw::get_bankweb',  ['filter' => 'auth']);
	$routes->post('confirm_withdraw_auto', 'withdraw::confirm_withdraw_auto',  ['filter' => 'auth']);
	$routes->post('cancel_wd_check', 'withdraw::cancel_wd_check',  ['filter' => 'auth']);
	$routes->post('cancel_withdraw', 'withdraw::cancel_withdraw',  ['filter' => 'auth']);
	$routes->post('remove_withdraw', 'withdraw::remove_withdraw',  ['filter' => 'auth']);
	$routes->post('reback_withdraw', 'withdraw::reback_withdraw',  ['filter' => 'auth']);
	$routes->post('checkStatusWithdraw', 'withdraw::checkStatusWithdraw',  ['filter' => 'auth']);
	$routes->post('filtersWithdraw', 'withdraw::filtersWithdraw',  ['filter' => 'auth']);
	$routes->post('filter', 'withdraw::filter',  ['filter' => 'auth']);
	$routes->post('csv', 'withdraw::csv',  ['filter' => 'auth']);
	$routes->get('check_withdrawal', 'withdraw::check_withdrawal',  ['filter' => 'auth']);
	$routes->post('check_status', 'withdraw::check_status',  ['filter' => 'auth']);
});



$routes->group('check_player', function ($routes) {
	$routes->get('show', 'check_player::index',  ['filter' => 'auth', 'filter' => 'isPermission:1,4,5']);
	$routes->post('filter', 'check_player::filter',  ['filter' => 'auth']);
	$routes->post('ref_deposit', 'check_player::ref_deposit',  ['filter' => 'auth']);
});

$routes->group('bank_statement', function ($routes) {
	$routes->get('show', 'bank_statement::index',  ['filter' => 'auth', 'filter' => 'isPermission:2,6,12']);
	$routes->post('create_Statement', 'bank_statement::create_Statement',  ['filter' => 'auth']);
	$routes->get('statement_list/(:num)', 'bank_statement::statement_list/$1',  ['filter' => 'auth']);
	$routes->post('check_balance', 'bank_statement::check_balance',  ['filter' => 'auth']);
	// $routes->get('statement_list', 'bank_statement::statement_list',  ['filter' => 'auth']);

});

$routes->group('broadcast', function ($routes) {
	$routes->get('show', 'broadcast::index',  ['filter' => 'auth', 'filter' => 'isPermission:2,13,46']);
	$routes->post('add_broadcast', 'broadcast::add_broadcast',  ['filter' => 'auth']);
	$routes->post('edit_broadcast', 'broadcast::edit_broadcast',  ['filter' => 'auth']);
});



$routes->group('forced_withdraw', function ($routes) {
	$routes->get('show', 'forced_withdraw::index',  ['filter' => 'auth', 'filter' => 'isPermission:1,3']);
	$routes->post('filter', 'forced_withdraw::filter',  ['filter' => 'auth']);
	$routes->post('withdraw', 'forced_withdraw::withdraw',  ['filter' => 'auth']);
});


$routes->group('line_notify', function ($routes) {
	$routes->get('show', 'line_notify::index',  ['filter' => 'auth', 'filter' => 'isPermission:2,17']);
	$routes->post('change_status', 'line_notify::change_status',  ['filter' => 'auth']);
	$routes->post('updateData', 'line_notify::updateData',  ['filter' => 'auth']);
});


$routes->group('turn_off_usersystem', function ($routes) {
	$routes->get('show', 'turn_off_usersystem::index',  ['filter' => 'auth', 'filter' => 'isPermission:2,13,46']);
	$routes->post('add_turn_off_usersystem', 'turn_off_usersystem::add_turn_off_usersystem',  ['filter' => 'auth']);
	$routes->post('edit_turn_off_usersystem', 'turn_off_usersystem::edit_turn_off_usersystem',  ['filter' => 'auth']);
});


$routes->group('blacklist', function ($routes) {
	$routes->get('show', 'blacklist::index',  ['filter' => 'auth', 'filter' => 'isPermission:2,13,46']);
	
});
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
