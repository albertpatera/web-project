<?php

namespace App\Router;

use Nette;
use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;


final class RouterFactory
{
	use Nette\StaticClass;

	/**
	 * @return Nette\Application\IRouter
	 */
	public static function createRouter()
	{
		$router = new RouteList;
		$router[] = new Route('<presenter>/<action>[/<id>]', 'Article:default');
		$router[] = new Route('<presenter>/<action>[/<id>]', 'User:add');
		//$router[] = new Route('<url>', 'Article:add');
		return $router;
	}
}
