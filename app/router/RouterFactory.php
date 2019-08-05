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
		//$router[] = new Route('<presenter>/<action>[/<id>]', 'Article:default');
		$router[] = new Route('[<url>]', 'User:add');
		$router[] = new Route('<presenter>/<action>[/<id>]', 'User:add');
		$router[] = new Route('/admin/', 'User:edit');
		//$router[] = new Route('/admin/<presenter>/<action>', 'Article:default');
		$router[] = new Route('/homepage/www', 'Homepage:www');
		$router[] = new Route('/homepage/admin/advance/element', 'Homepage:webComp');
		$router[] = new Route('/core/test/function/danger', 'Test:default');
		//$router[] = new Route('<url>', 'Article:add');
		//$router[] = new Route('<url>/test', 'Article:add');
		return $router;
	}
}
