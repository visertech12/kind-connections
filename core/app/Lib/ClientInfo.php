<?php

namespace App\Lib;

class ClientInfo{

    /**
    * Get requestor IP information
    *
    * @return array
    */
	public static function ipInfo()
	{
	    $ip = getRealIP();

	    $country = $city = $area = $code = $long = $lat = '';

	    // Skip lookup for local/private IPs (use server's public IP instead)
	    $lookupIp = filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) ? $ip : '';

	    $endpoints = [
	        'https://ipwho.is/' . $lookupIp,
	        'http://ip-api.com/json/' . $lookupIp . '?fields=status,country,countryCode,region,city,lat,lon,query',
	        'https://ipapi.co/' . ($lookupIp ?: '') . '/json/',
	    ];

	    foreach ($endpoints as $url) {
	        try {
	            $res = self::httpGet($url);
	            if (!$res) continue;
	            $j = json_decode($res, true);
	            if (!is_array($j)) continue;

	            if (isset($j['status']) && $j['status'] === 'success') { // ip-api.com
	                $country = (string)($j['country'] ?? '');
	                $city    = (string)($j['city'] ?? '');
	                $area    = (string)($j['region'] ?? '');
	                $code    = (string)($j['countryCode'] ?? '');
	                $long    = (string)($j['lon'] ?? '');
	                $lat     = (string)($j['lat'] ?? '');
	                break;
	            }
	            if (isset($j['success']) && $j['success'] === true) { // ipwho.is
	                $country = (string)($j['country'] ?? '');
	                $city    = (string)($j['city'] ?? '');
	                $area    = (string)($j['region'] ?? '');
	                $code    = (string)($j['country_code'] ?? '');
	                $long    = (string)($j['longitude'] ?? '');
	                $lat     = (string)($j['latitude'] ?? '');
	                break;
	            }
	            if (isset($j['country_name']) && !isset($j['error'])) { // ipapi.co
	                $country = (string)($j['country_name'] ?? '');
	                $city    = (string)($j['city'] ?? '');
	                $area    = (string)($j['region'] ?? '');
	                $code    = (string)($j['country_code'] ?? '');
	                $long    = (string)($j['longitude'] ?? '');
	                $lat     = (string)($j['latitude'] ?? '');
	                break;
	            }
	        } catch (\Throwable $e) {
	            continue;
	        }
	    }

	    $data['country'] = $country;
	    $data['city']    = $city;
	    $data['area']    = $area;
	    $data['code']    = $code;
	    $data['long']    = $long;
	    $data['lat']     = $lat;
	    $data['ip']      = $ip;
	    $data['time']    = date('Y-m-d h:i:s A');

	    return $data;
	}

	private static function httpGet($url)
	{
	    if (function_exists('curl_init')) {
	        $ch = curl_init($url);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
	        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
	        $res = curl_exec($ch);
	        curl_close($ch);
	        if ($res) return $res;
	    }
	    if (ini_get('allow_url_fopen')) {
	        $ctx = stream_context_create([
	            'http' => ['timeout' => 5, 'user_agent' => 'Mozilla/5.0'],
	            'ssl'  => ['verify_peer' => false, 'verify_peer_name' => false],
	        ]);
	        $res = @file_get_contents($url, false, $ctx);
	        if ($res) return $res;
	    }
	    return null;
	}

    /**
    * Get requestor operating system information
    *
    * @return array
    */
	public static function osBrowser(){
	    $userAgent = $_SERVER['HTTP_USER_AGENT'];
	    $osPlatform = "Unknown OS Platform";
	    $osArray = array(
	        '/windows nt 10/i' => 'Windows 10',
	        '/windows nt 6.3/i' => 'Windows 8.1',
	        '/windows nt 6.2/i' => 'Windows 8',
	        '/windows nt 6.1/i' => 'Windows 7',
	        '/windows nt 6.0/i' => 'Windows Vista',
	        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
	        '/windows nt 5.1/i' => 'Windows XP',
	        '/windows xp/i' => 'Windows XP',
	        '/windows nt 5.0/i' => 'Windows 2000',
	        '/windows me/i' => 'Windows ME',
	        '/win98/i' => 'Windows 98',
	        '/win95/i' => 'Windows 95',
	        '/win16/i' => 'Windows 3.11',
	        '/macintosh|mac os x/i' => 'Mac OS X',
	        '/mac_powerpc/i' => 'Mac OS 9',
	        '/linux/i' => 'Linux',
	        '/ubuntu/i' => 'Ubuntu',
	        '/iphone/i' => 'iPhone',
	        '/ipod/i' => 'iPod',
	        '/ipad/i' => 'iPad',
	        '/android/i' => 'Android',
	        '/blackberry/i' => 'BlackBerry',
	        '/webos/i' => 'Mobile'
	    );
	    foreach ($osArray as $regex => $value) {
	        if (preg_match($regex, $userAgent)) {
	            $osPlatform = $value;
	        }
	    }
	    $browser = "Unknown Browser";
	    $browserArray = array(
	        '/msie/i' => 'Internet Explorer',
	        '/firefox/i' => 'Firefox',
	        '/safari/i' => 'Safari',
	        '/chrome/i' => 'Chrome',
	        '/edge/i' => 'Edge',
	        '/opera/i' => 'Opera',
	        '/netscape/i' => 'Netscape',
	        '/maxthon/i' => 'Maxthon',
	        '/konqueror/i' => 'Konqueror',
	        '/mobile/i' => 'Handheld Browser'
	    );
	    foreach ($browserArray as $regex => $value) {
	        if (preg_match($regex, $userAgent)) {
	            $browser = $value;
	        }
	    }

	    $data['os_platform'] = $osPlatform;
	    $data['browser'] = $browser;

	    return $data;
	}

}
