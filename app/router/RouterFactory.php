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
		//$router[] = new Route('/admin/<presenter>/<action>[/<id>]', 'Article:default');
		//toto je pouze pro localhost na windows
        $router[] = new Route('/web_cms/web-project/www/admin/<presenter>/<action>[/<id>]', 'Article:default');
		//konec

        $router[] = new Route('<presenter>/<action>[/<url>]', 'User:edit');
		$router[] = new Route('[<url>]', 'User:add');
		$router[] = new Route('[<url>]', 'User:add');
		$router[] = new Route('<presenter>/<action>[/<id>]', 'User:add');
		//$router[] = new Route('<url>', 'Article:add');
		return $router;
	}
}
