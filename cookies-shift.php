<?php
/*
Plugin Name: Cookie shifter
Plugin URI: https://alkoweb.ru/p=995
Author: Vladimir Petrozavodsky
Author URI: http://alkoweb.ru
*/


add_filter( 'auth_cookie_expiration',
	function ( $expiration, $user_id, $remember ) {

		// Вермя жизни cookies для администратора
		if ( $remember && user_can( $user_id, 'manage_options' ) ) {
			// Если установлена галочка
			if ( $remember == true ) {
				return 20 * DAY_IN_SECONDS;
			}

			// Если не установлена
			return 5 * DAY_IN_SECONDS;
		}

		// Для всех остальных пользователей
		// Если установлена галочка
		if ( $remember == true ) {
			return 360 * DAY_IN_SECONDS;
		}

		// Если не установлена
		return 180 * DAY_IN_SECONDS;
	},
	100,
	3
);