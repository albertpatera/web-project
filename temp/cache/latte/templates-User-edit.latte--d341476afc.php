<?php

use Latte\Runtime as LR;

/** source: /var/www/blog.albertpatera.cz/app/presenters/templates/User/edit.latte */
final class Templated341476afc extends Latte\Runtime\Template
{

	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
';
		foreach ($userValue as $mainTitle) /* line 12 */ {
			echo '    <title>';
			echo LR\Filters::escapeHtmlText($mainTitle->username) /* line 13 */;
			echo '\' s Timeline | Albert Patera</title>

';

		}

		echo '</head>
<body>


';
		$this->createTemplate('layoutInfoBar.latte', $this->params, 'include')->renderToContentType('html') /* line 20 */;
		echo '<div class="container-fluid">


';
		foreach ($userValue as $userOutput) /* line 24 */ {
			echo '    <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('User:logout'));
			echo '">Logout ';
			echo LR\Filters::escapeHtmlText($userOutput->username) /* line 25 */;
			echo '</a>

    <div class="card d-inline-block" style="width:20rem;margin:20px 0 24px 0">
        <img class="card-img-top" src="https://upload.albertpatera.cz/logo.png">
        <div class="card-body">

            <h4 class="card-title">';
			echo LR\Filters::escapeHtmlText(($this->filters->upper)($userOutput->username)) /* line 31 */;
			echo '</h4>
            <label class="badge badge-secondary">';
			echo LR\Filters::escapeHtmlText($userOutput->role) /* line 32 */;
			echo '</label>
            <p class="card-text"><a href="#">';
			echo LR\Filters::escapeHtmlText($userOutput->url) /* line 33 */;
			echo '</a></p>
            <p class="card-text text-justify text-muted"><i>';
			echo LR\Filters::escapeHtmlText($userOutput->sign) /* line 34 */;
			echo ' </i></p>
            <a href="javascript:void(0)" class="btn btn-primary">See Profile</a>

        </div>
    </div>>
';

		}

		echo '</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
';
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['mainTitle' => '12', 'userOutput' => '24'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}
}
