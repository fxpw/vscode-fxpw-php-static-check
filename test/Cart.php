<?php
namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

class Cart extends Model
{
	public static function countCacheCartItems()
	{

		$Personal = Cookie::get('personal_hash');
		$cache_key = $Personal . "_temp_cache_cart";
		$test = "афыафыа";
		$cache_data = Cache::get($cache_key);
		if ($cache_data) {
			return count($cache_data);
		}
		return '';
	}
}
