<?php

use Latte\Runtime as LR;

/** source: /var/www/blog.albertpatera.cz/app/presenters/templates/User/add.latte */
final class Template3e1f5763bb extends Latte\Runtime\Template
{
	public const Blocks = [
		['content' => 'blockContent', 'head' => 'blockHead', 'title' => 'blockTitle'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo "\n";
		$this->renderBlock('content', get_defined_vars()) /* line 2 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['article' => '23'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block content} on line 2 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('head', get_defined_vars()) /* line 3 */;
		$this->renderBlock('title', get_defined_vars()) /* line 8 */;
		echo '    <h2><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Article:default'));
		echo '">Article Manager</a></h2>
';
		$ʟ_tmp = $this->global->uiControl->getComponent('addUser');
		if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
		$ʟ_tmp->render() /* line 11 */;

		echo '    <table class="table">

        <tr>
            <th>#</th>
            <th>username</th>
            <th>role</th>
            <th>url</th>
            <th>profile image</th>
            <th>profile image</th>
            <th>action</th>
        </tr>
';
		foreach ($userValue as $article) /* line 23 */ {
			echo "\n";
			if ($article) /* line 25 */ {
				echo '            <tr>
                <td>';
				echo LR\Filters::escapeHtmlText($article->id) /* line 26 */;
				echo '</td>
                <td>';
				echo LR\Filters::escapeHtmlText($article->username) /* line 27 */;
				echo '</td>
                <td>';
				echo LR\Filters::escapeHtmlText($article->role) /* line 28 */;
				echo '</td>
                <td>';
				echo LR\Filters::escapeHtmlText($article->url) /* line 29 */;
				echo '</td>
                <td>';
				echo LR\Filters::escapeHtmlText($article->prof_image) /* line 30 */;
				echo '</td>
                <td>
                    <a href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('User:edit', [$article]));
				echo '">';
				echo LR\Filters::escapeHtmlText($article->url) /* line 32 */;
				echo '</a>
                </td>

                <td>
                    | <a href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('User:edit'));
				echo '">Edit</a>
                    | <a href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('User:remove', [$article->id]));
				echo '">X</a>
                    | <a href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('User:visible'));
				echo '">visible</a> |
                </td>
            </tr>
';
			}
			echo '

';

		}

		echo '    </table>
';
	}


	/** {block head} on line 3 */
	public function blockHead(array $ʟ_args): void
	{
		echo '        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
';
	}


	/** n:block="title" on line 8 */
	public function blockTitle(array $ʟ_args): void
	{
		echo '    <h1 class="test-center alert alert-success">Adding articles</h1>
';
	}
}
