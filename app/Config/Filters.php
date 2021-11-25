<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'auth'      => \App\Filters\Auth::class,
		'scan2FT'      => \App\Filters\Scan2FT::class,
		'ValidateEmergency' => \App\Filters\ValidateEmergency::class,
		'FetchMenu' => \App\Filters\FetchMenu::class,
		'isPermission' => \App\Filters\isPermission::class,
		'validatorToken' => \App\Filters\validatorToken::class,
		'isAtWorkTime' => \App\Filters\isAtWorkTime::class,

	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			// 'honeypot',
			'ValidateEmergency' => ['except' => ['emergency']],
			'FetchMenu' => ['except' => ['emergency']],
			'csrf'  => ['except' => ['emergency/index', 'auth/auth', 'bank_auto/createBankAuto', 'withdraw/get_bankweb_balanace', 'withdraw/get_bankweb', 'withdraw/confirm_withdraw_auto', 'withdraw/cancel_wd_check', 'withdraw/cancel_withdraw', 'withdraw/remove_withdraw', 'withdraw/reback_withdraw', 'withdraw/see_withdraw', 'withdraw/checkStatusWithdraw', 'withdraw/filtersWithdraw', 'withdraw/check_withdrawal', 'bank_statement/statement_list/$1', 'withdraw/check_status']],
			'validatorToken' => ['except' => ['emergency', 'auth/auth', 'auth/auth2FT', 'auth/scan_auth2FT', '/', 'auth/logout', 'auth/scan2FT']],
			'isAtWorkTime' => ['except' => ['emergency', 'auth/auth', 'auth/auth2FT', 'auth/scan_auth2FT', '/', 'auth/logout', 'auth/scan2FT']],
		],
		'after'  => [
			'toolbar',
			// 'honeypot',
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [];
}
