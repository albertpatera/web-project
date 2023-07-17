<?php
// source: /var/www/blog.albertpatera.cz/app/config/config.neon
// source: /var/www/blog.albertpatera.cz/app/config/config.local.neon
// source: array

/** @noinspection PhpParamsInspection,PhpMethodMayBeStaticInspection */

declare(strict_types=1);

class Container_4c8c2a232e extends Nette\DI\Container
{
	protected $tags = [
		'nette.inject' => [
			'01' => true,
			'03' => true,
			'05' => true,
			'application.1' => true,
			'application.2' => true,
			'application.3' => true,
			'application.4' => true,
			'application.5' => true,
			'application.6' => true,
		],
	];

	protected $types = ['container' => 'Nette\DI\Container'];

	protected $aliases = [
		'application' => 'application.application',
		'cacheStorage' => 'cache.storage',
		'database.default' => 'database.default.connection',
		'database.default.context' => 'database.default.explorer',
		'httpRequest' => 'http.request',
		'httpResponse' => 'http.response',
		'nette.cacheJournal' => 'cache.journal',
		'nette.database.default' => 'database.default',
		'nette.database.default.context' => 'database.default.explorer',
		'nette.httpRequestFactory' => 'http.requestFactory',
		'nette.latteFactory' => 'latte.latteFactory',
		'nette.mailer' => 'mail.mailer',
		'nette.presenterFactory' => 'application.presenterFactory',
		'nette.templateFactory' => 'latte.templateFactory',
		'nette.userStorage' => 'security.userStorage',
		'session' => 'session.session',
		'user' => 'security.user',
	];

	protected $wiring = [
		'Nette\DI\Container' => [['container']],
		'Nette\Application\Application' => [['application.application']],
		'Nette\Application\IPresenterFactory' => [['application.presenterFactory']],
		'Nette\Application\LinkGenerator' => [['application.linkGenerator']],
		'Nette\Caching\Storages\Journal' => [['cache.journal']],
		'Nette\Caching\Storage' => [['cache.storage']],
		'Nette\Database\Connection' => [['database.default.connection']],
		'Nette\Database\IStructure' => [['database.default.structure']],
		'Nette\Database\Structure' => [['database.default.structure']],
		'Nette\Database\Conventions' => [['database.default.conventions']],
		'Nette\Database\Conventions\DiscoveredConventions' => [['database.default.conventions']],
		'Nette\Database\Explorer' => [['database.default.explorer']],
		'Nette\Http\RequestFactory' => [['http.requestFactory']],
		'Nette\Http\IRequest' => [['http.request']],
		'Nette\Http\Request' => [['http.request']],
		'Nette\Http\IResponse' => [['http.response']],
		'Nette\Http\Response' => [['http.response']],
		'Nette\Bridges\ApplicationLatte\LatteFactory' => [['latte.latteFactory']],
		'Nette\Application\UI\TemplateFactory' => [['latte.templateFactory']],
		'Nette\Bridges\ApplicationLatte\TemplateFactory' => [['latte.templateFactory']],
		'Nette\Mail\Mailer' => [['mail.mailer']],
		'Nette\Security\Passwords' => [['security.passwords']],
		'Nette\Security\UserStorage' => [['security.userStorage']],
		'Nette\Security\IUserStorage' => [['security.legacyUserStorage']],
		'Nette\Security\User' => [['security.user']],
		'Nette\Http\Session' => [['session.session']],
		'Tracy\ILogger' => [['tracy.logger']],
		'Tracy\BlueScreen' => [['tracy.blueScreen']],
		'Tracy\Bar' => [['tracy.bar']],
		'Nette\Routing\Router' => [['router']],
		'Nette\Application\UI\Presenter' => [2 => ['01', '03', '05', 'application.1', 'application.3', 'application.4']],
		'Nette\Application\UI\Control' => [2 => ['01', '03', '05', 'application.1', 'application.3', 'application.4']],
		'Nette\Application\UI\Component' => [2 => ['01', '03', '05', 'application.1', 'application.3', 'application.4']],
		'Nette\ComponentModel\Container' => [2 => ['01', '03', '05', 'application.1', 'application.3', 'application.4']],
		'Nette\ComponentModel\Component' => [2 => ['01', '03', '05', 'application.1', 'application.3', 'application.4']],
		'Nette\Application\IPresenter' => [
			2 => [
				'01',
				'03',
				'05',
				'application.1',
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
			],
		],
		'Nette\Application\UI\Renderable' => [2 => ['01', '03', '05', 'application.1', 'application.3', 'application.4']],
		'ArrayAccess' => [2 => ['01', '03', '05', 'application.1', 'application.3', 'application.4']],
		'Nette\Application\UI\StatePersistent' => [
			2 => ['01', '03', '05', 'application.1', 'application.3', 'application.4'],
		],
		'Nette\Application\UI\SignalReceiver' => [
			2 => ['01', '03', '05', 'application.1', 'application.3', 'application.4'],
		],
		'Nette\ComponentModel\IContainer' => [2 => ['01', '03', '05', 'application.1', 'application.3', 'application.4']],
		'Nette\ComponentModel\IComponent' => [2 => ['01', '03', '05', 'application.1', 'application.3', 'application.4']],
		'App\Presenters\ArticlePresenter' => [2 => ['01']],
		'App\Model\DatabaseManager' => [['02', '04', '06']],
		'App\Model\ArticleManager' => [['02']],
		'App\Presenters\UserPresenter' => [2 => ['03']],
		'Nette\Security\IAuthenticator' => [['04']],
		'App\Model\UserManager' => [['04']],
		'App\Presenters\HomepagePresenter' => [2 => ['05']],
		'App\Model\HomepageManager' => [['06']],
		'App\Presenters\AdminPresenter' => [2 => ['application.1']],
		'App\Presenters\ErrorPresenter' => [2 => ['application.2']],
		'App\Presenters\Error4xxPresenter' => [2 => ['application.3']],
		'App\Presenters\TestPresenter' => [2 => ['application.4']],
		'NetteModule\ErrorPresenter' => [2 => ['application.5']],
		'NetteModule\MicroPresenter' => [2 => ['application.6']],
	];


	public function __construct(array $params = [])
	{
		parent::__construct($params);
		$this->parameters += [
			'database' => [
				'driver' => 'mysql',
				'host' => 'localhost',
				'port' => 3306,
				'dbname' => 'test',
				'user' => 'newuser',
				'password' => 'password',
			],
			'appDir' => '/var/www/blog.albertpatera.cz/app',
			'wwwDir' => '/var/www/blog.albertpatera.cz/www',
			'vendorDir' => '/var/www/blog.albertpatera.cz/vendor',
			'debugMode' => true,
			'productionMode' => false,
			'consoleMode' => false,
			'tempDir' => '/var/www/blog.albertpatera.cz/app/../temp',
		];
	}


	public function createService01(): App\Presenters\ArticlePresenter
	{
		$service = new App\Presenters\ArticlePresenter('url');
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory'),
		);
		$service->url = $this->getService('02');
		$service->articleValueNow = $this->getService('02');
		$service->articleValue = $this->getService('02');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createService02(): App\Model\ArticleManager
	{
		return new App\Model\ArticleManager($this->getService('database.default.explorer'));
	}


	public function createService03(): App\Presenters\UserPresenter
	{
		$service = new App\Presenters\UserPresenter($this->getService('session.session'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory'),
		);
		$service->userValue = $this->getService('04');
		$service->userManager = $this->getService('04');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createService04(): App\Model\UserManager
	{
		return new App\Model\UserManager($this->getService('database.default.explorer'));
	}


	public function createService05(): App\Presenters\HomepagePresenter
	{
		$service = new App\Presenters\HomepagePresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory'),
		);
		$service->websiteElementValueHeader = $this->getService('06');
		$service->websiteElementValueFooter = $this->getService('06');
		$service->userValue = $this->getService('04');
		$service->articleValue = $this->getService('02');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createService06(): App\Model\HomepageManager
	{
		return new App\Model\HomepageManager($this->getService('database.default.explorer'));
	}


	public function createServiceApplication__1(): App\Presenters\AdminPresenter
	{
		$service = new App\Presenters\AdminPresenter($this->getService('session.session'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory'),
		);
		$service->userValue = $this->getService('04');
		$service->userManager = $this->getService('04');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__2(): App\Presenters\ErrorPresenter
	{
		return new App\Presenters\ErrorPresenter($this->getService('tracy.logger'));
	}


	public function createServiceApplication__3(): App\Presenters\Error4xxPresenter
	{
		$service = new App\Presenters\Error4xxPresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory'),
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__4(): App\Presenters\TestPresenter
	{
		$service = new App\Presenters\TestPresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory'),
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__5(): NetteModule\ErrorPresenter
	{
		return new NetteModule\ErrorPresenter($this->getService('tracy.logger'));
	}


	public function createServiceApplication__6(): NetteModule\MicroPresenter
	{
		return new NetteModule\MicroPresenter($this, $this->getService('http.request'), $this->getService('router'));
	}


	public function createServiceApplication__application(): Nette\Application\Application
	{
		$service = new Nette\Application\Application(
			$this->getService('application.presenterFactory'),
			$this->getService('router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
		);
		$service->catchExceptions = null;
		$service->errorPresenter = 'Error';
		Nette\Bridges\ApplicationDI\ApplicationExtension::initializeBlueScreenPanel(
			$this->getService('tracy.blueScreen'),
			$service,
		);
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\ApplicationTracy\RoutingPanel(
			$this->getService('router'),
			$this->getService('http.request'),
			$this->getService('application.presenterFactory'),
		));
		return $service;
	}


	public function createServiceApplication__linkGenerator(): Nette\Application\LinkGenerator
	{
		return new Nette\Application\LinkGenerator(
			$this->getService('router'),
			$this->getService('http.request')->getUrl()->withoutUserInfo(),
			$this->getService('application.presenterFactory'),
		);
	}


	public function createServiceApplication__presenterFactory(): Nette\Application\IPresenterFactory
	{
		$service = new Nette\Application\PresenterFactory(new Nette\Bridges\ApplicationDI\PresenterFactoryCallback(
			$this,
			5,
			'/var/www/blog.albertpatera.cz/app/../temp/cache/nette.application/touch',
		));
		$service->setMapping(['*' => 'App\*Module\Presenters\*Presenter']);
		return $service;
	}


	public function createServiceCache__journal(): Nette\Caching\Storages\Journal
	{
		return new Nette\Caching\Storages\SQLiteJournal('/var/www/blog.albertpatera.cz/app/../temp/cache/journal.s3db');
	}


	public function createServiceCache__storage(): Nette\Caching\Storage
	{
		return new Nette\Caching\Storages\FileStorage(
			'/var/www/blog.albertpatera.cz/app/../temp/cache',
			$this->getService('cache.journal'),
		);
	}


	public function createServiceContainer(): Container_4c8c2a232e
	{
		return $this;
	}


	public function createServiceDatabase__default__connection(): Nette\Database\Connection
	{
		$service = new Nette\Database\Connection('mysql:host=localhost;dbname=blog', 'newuser', 'pltkrcni', ['lazy' => true]);
		Nette\Bridges\DatabaseTracy\ConnectionPanel::initialize(
			$service,
			true,
			'default',
			true,
			$this->getService('tracy.bar'),
			$this->getService('tracy.blueScreen'),
		);
		return $service;
	}


	public function createServiceDatabase__default__conventions(): Nette\Database\Conventions\DiscoveredConventions
	{
		return new Nette\Database\Conventions\DiscoveredConventions($this->getService('database.default.structure'));
	}


	public function createServiceDatabase__default__explorer(): Nette\Database\Explorer
	{
		return new Nette\Database\Explorer(
			$this->getService('database.default.connection'),
			$this->getService('database.default.structure'),
			$this->getService('database.default.conventions'),
			$this->getService('cache.storage'),
		);
	}


	public function createServiceDatabase__default__structure(): Nette\Database\Structure
	{
		return new Nette\Database\Structure($this->getService('database.default.connection'), $this->getService('cache.storage'));
	}


	public function createServiceHttp__request(): Nette\Http\Request
	{
		return $this->getService('http.requestFactory')->fromGlobals();
	}


	public function createServiceHttp__requestFactory(): Nette\Http\RequestFactory
	{
		$service = new Nette\Http\RequestFactory;
		$service->setProxy([]);
		return $service;
	}


	public function createServiceHttp__response(): Nette\Http\Response
	{
		$service = new Nette\Http\Response;
		$service->cookieSecure = $this->getService('http.request')->isSecured();
		return $service;
	}


	public function createServiceLatte__latteFactory(): Nette\Bridges\ApplicationLatte\LatteFactory
	{
		return new class ($this) implements Nette\Bridges\ApplicationLatte\LatteFactory {
			private $container;


			public function __construct(Container_4c8c2a232e $container)
			{
				$this->container = $container;
			}


			public function create(): Latte\Engine
			{
				$service = new Latte\Engine;
				$service->setTempDirectory('/var/www/blog.albertpatera.cz/app/../temp/cache/latte');
				$service->setAutoRefresh(true);
				$service->setStrictTypes(false);
				return $service;
			}
		};
	}


	public function createServiceLatte__templateFactory(): Nette\Bridges\ApplicationLatte\TemplateFactory
	{
		$service = new Nette\Bridges\ApplicationLatte\TemplateFactory(
			$this->getService('latte.latteFactory'),
			$this->getService('http.request'),
			$this->getService('security.user'),
			$this->getService('cache.storage'),
			null,
		);
		Nette\Bridges\ApplicationDI\LatteExtension::initLattePanel($service, $this->getService('tracy.bar'), false);
		return $service;
	}


	public function createServiceMail__mailer(): Nette\Mail\Mailer
	{
		return new Nette\Mail\SendmailMailer;
	}


	public function createServiceRouter(): Nette\Routing\Router
	{
		return App\Router\RouterFactory::createRouter();
	}


	public function createServiceSecurity__legacyUserStorage(): Nette\Security\IUserStorage
	{
		return new Nette\Http\UserStorage($this->getService('session.session'));
	}


	public function createServiceSecurity__passwords(): Nette\Security\Passwords
	{
		return new Nette\Security\Passwords;
	}


	public function createServiceSecurity__user(): Nette\Security\User
	{
		$service = new Nette\Security\User(
			$this->getService('security.legacyUserStorage'),
			$this->getService('04'),
			storage: $this->getService('security.userStorage'),
		);
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\SecurityTracy\UserPanel($service));
		return $service;
	}


	public function createServiceSecurity__userStorage(): Nette\Security\UserStorage
	{
		return new Nette\Bridges\SecurityHttp\SessionStorage($this->getService('session.session'));
	}


	public function createServiceSession__session(): Nette\Http\Session
	{
		$service = new Nette\Http\Session($this->getService('http.request'), $this->getService('http.response'));
		$service->setExpiration('14 days');
		$service->setOptions(['readAndClose' => null, 'cookieSamesite' => 'Lax']);
		return $service;
	}


	public function createServiceTracy__bar(): Tracy\Bar
	{
		return Tracy\Debugger::getBar();
	}


	public function createServiceTracy__blueScreen(): Tracy\BlueScreen
	{
		return Tracy\Debugger::getBlueScreen();
	}


	public function createServiceTracy__logger(): Tracy\ILogger
	{
		return Tracy\Debugger::getLogger();
	}


	public function initialize()
	{
		// di.
		(function () {
			$this->getService('tracy.bar')->addPanel(new Nette\Bridges\DITracy\ContainerPanel($this));
		})();
		// http.
		(function () {
			$response = $this->getService('http.response');
			$response->setHeader('X-Powered-By', 'Nette Framework 3');
			$response->setHeader('Content-Type', 'text/html; charset=utf-8');
			$response->setHeader('X-Frame-Options', 'SAMEORIGIN');
			Nette\Http\Helpers::initCookie($this->getService('http.request'), $response);
		})();
		// session.
		(function () {
			$this->getService('session.session')->autoStart(false);
		})();
		// tracy.
		(function () {
			if (!Tracy\Debugger::isEnabled()) { return; }
			Tracy\Debugger::getLogger()->mailer = [
				new Tracy\Bridges\Nette\MailSender($this->getService('mail.mailer'), null),
				'send',
			];
		})();
	}
}
