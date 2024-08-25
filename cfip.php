<?php
require_once("cfgeo.php");
require_once("functions.php");

$today_date = date("F j");
$today_year = date("Y");
$today_time = date("g:i a");
//$log = preg_replace('/\s+/', '', $today);
$logfile = "/var/www/tyclifford/dec-ip_b-test.csv";

$agent = $_SERVER["HTTP_USER_AGENT"];
$uri = $_SERVER['REQUEST_URI'];



if( preg_match('/MSIE (\d+\.\d+);/', $agent) ) {
  $browser = "Internet Explorer";
} else if (preg_match('/Chrome[\/\s](\d+\.\d+)/', $agent) ) {
  $browser =  "Chrome";
} else if (preg_match('/Edge\/\d+/', $agent) ) {
  $browser = "Edge";
} else if ( preg_match('/Firefox[\/\s](\d+\.\d+)/', $agent) ) {
  $browser = "Firefox";
} else if ( preg_match('/OPR[\/\s](\d+\.\d+)/', $agent) ) {
  $browser = "Opera";
} else if (preg_match('/Safari[\/\s](\d+\.\d+)/', $agent) ) {
  $browser = "Safari";
}


function get_ip(){
    if( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
}

function get_real_ip(){
    // Get IP Address
    $ip = get_ip();

    if( function_exists( 'is_cloudflare' ) ){
        if( is_cloudflare() ) {
            $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
        }
    }

    return strip_tags( $ip );
}

function ip_in_range( $ip, $range ){
    if ( mb_strpos( $range, '/' ) == false )
        $range .= '/32';

    // $range is in IP/CIDR format eg 127.0.0.1/24
    list( $range, $netmask ) = explode( '/', $range, 2 );
    $range_decimal = ip2long( $range );
    $ip_decimal = ip2long( $ip );
    $wildcard_decimal = ( pow( 2, ( 32 - $netmask ) ) - 1);
    $netmask_decimal = ~ $wildcard_decimal;
    return ( ( $ip_decimal & $netmask_decimal ) == ( $range_decimal & $netmask_decimal ) );
}

function __cloudflare_check_ip( $ip ){
    // @link https://www.cloudflare.com/ips/
    $cf_ips = array(
        '199.27.128.0/21',
        '173.245.48.0/20',
        '103.21.244.0/22',
        '103.22.200.0/22',
        '103.31.4.0/22',
        '141.101.64.0/18',
        '108.162.192.0/18',
        '190.93.240.0/20',
        '188.114.96.0/20',
        '197.234.240.0/22',
        '198.41.128.0/17',
        '162.158.0.0/15',
        '104.16.0.0/12',
        '172.64.0.0/13',
        '131.0.72.0/22'
    );

    $is_cf_ip = false;
    foreach( $cf_ips as $cf_ip ) {
        if( ip_in_range( $ip, $cf_ip ) ){
            $is_cf_ip = true;
            break;
        }
    }

    return $is_cf_ip;
}

function __cloudflare_requests_check() {
    $flag = true;

    if( ! ( isset( $_SERVER['HTTP_CF_CONNECTING_IP'] ) || isset( $_SERVER['HTTP_CF_IPCOUNTRY'] ) || isset( $_SERVER['HTTP_CF_RAY'] ) || isset( $_SERVER['HTTP_CF_VISITOR'] ) ) )
        $flag = false;

    return $flag;
}

function is_cloudflare() {
    $ip_cf_check      = __cloudflare_check_ip( get_ip() );
    $cf_request_check = __cloudflare_requests_check();

    return (bool) ( $ip_cf_check && $cf_request_check );
}

$v_ip = get_real_ip();


//echo "<p>MIP: <code>{$my_ip}</code></p><br />";
//$sfip = $_SERVER['REMOTE_ADDR'];
//echo $sfip;

$myfile = fopen("$logfile", "a") or die("File lock!");
$txt = "$v_ip,$today_date,$today_year,$today_time,$browser,$uri,$v_a\n";
fwrite($myfile, $txt);
fclose($myfile);

//echo "$today";
