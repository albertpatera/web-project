<?php

use Latte\Runtime as LR;

/** source: /var/www/blog.albertpatera.cz/app/presenters/templates/User/layoutInfoBar.latte */
final class Template92f285699e extends Latte\Runtime\Template
{

	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<style>

    /* Container holding the image and the text */
    .container_header {
        position: relative;
    }

    /* Bottom right text */
    .text-block {
        position: absolute;
        bottom: 350px;
        right: 600px;
        background-color: black;
        color: white;
        /*padding-left: 20px;
        padding-right: 20px;*/
        padding: 25px;
        display: block;
        margin: 0 auto;
        background-color: rgba(0,0,0,0.5);
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
';
		foreach ($userValue as $userConfig) /* line 25 */ {
			echo '        <a class="navbar-brand" href="#">Albert Patera</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/user/edit?user=blog">Blog</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>

                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('User:logout'));
			echo '" class="btn btn-outline-danger my-2 my-sm-0" title="LogOut"><i class="sign-out-alt"></i> ';
			echo LR\Filters::escapeHtmlText($userConfig->username) /* line 62 */;
			echo '</a>


        </div>
';

		}

		echo '</nav>';
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['userConfig' => '25'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}
}
