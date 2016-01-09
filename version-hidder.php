<?php
/*
Plugin Name: Version-hidder
Plugin URI: http://страница_с_описанием_плагина_и_его_обновлений
Description: Simply remove Wordpress version from public.
Version: 0.1.0
Author: Roman 'pomaxa' Shvets
Author URI: http://p4.lv
*/

/*  Copyright 2016 Roman 'pomaxa' Shvets (email: pomaxa@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

$GLOBALS['wp_version'] = sha1($GLOBALS['wp_version'].'iNNextVerS1onH3reWillBeOption');

function remove_wp_ver_par( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) ) {
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}
add_filter( 'style_loader_src', 'remove_wp_ver_par', 9999 );
add_filter( 'script_loader_src', 'remove_wp_ver_par', 9999 );
