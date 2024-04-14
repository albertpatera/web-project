<?php

use Latte\Runtime as LR;

/** source: /var/www/blog.albertpatera.cz/app/presenters/templates/Article/default.latte */
final class Templateac0f6cc45e extends Latte\Runtime\Template
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

		$this->renderBlock('content', get_defined_vars()) /* line 2 */;
		echo "\n";
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['article' => '25', 'articleDayly' => '57'], $this->params) as $ʟ_v => $ʟ_l) {
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
		echo '   <h2><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('User:add'));
		echo '">User manager</a></h2>
';
		$ʟ_tmp = $this->global->uiControl->getComponent('postForm');
		if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
		$ʟ_tmp->render() /* line 10 */;

		echo '<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <table class="table">

          <tr>
             <th>#</th>
             <th>Main Title</th>
             <th>description</th>
             <th>profile</th>
             <th>action</th>
          </tr>

        <h3>All Articles</h3>
';
		foreach ($articleValue as $article) /* line 25 */ {
			echo '
          <tr>
             <td>';
			echo LR\Filters::escapeHtmlText($article->id) /* line 28 */;
			echo '</td>
             <td>';
			echo LR\Filters::escapeHtmlText($article->username) /* line 29 */;
			echo '</td>
             <td>';
			echo LR\Filters::escapeHtmlText($article->description) /* line 30 */;
			echo '</td>
             <td>
                <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Article:default'));
			echo '">link</a>
             </td>
             <td>
               | <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Article:edit'));
			echo '">Edit</a>
               | <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Article:remove'));
			echo '">X</a>
               | <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Article:visible'));
			echo '">visible</a> |
             </td>
          </tr>

';

		}

		echo '            </table>
    <hr>
<div class="row">
    <div class="col-md-10">
        <h3>All  posts per 1 day</h3>
        <table class="table">

            <tr>
                <th>#</th>
                <th>Main Title</th>
                <th>description</th>
                <th>profile</th>
                <th>date</th>
                <th>action</th>
            </tr>
';
		foreach ($articleValueNow as $articleDayly) /* line 57 */ {
			echo '        <tr>
            <td>';
			echo LR\Filters::escapeHtmlText($articleDayly->id) /* line 59 */;
			echo '</td>
            <td>';
			echo LR\Filters::escapeHtmlText($articleDayly->username) /* line 60 */;
			echo '</td>
            <td>';
			echo $articleDayly->description /* line 61 */;
			echo '</td>
            <td>
                <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Article:default'));
			echo '">link</a>
            </td>
            <td>';
			echo LR\Filters::escapeHtmlText($articleDayly->date_created) /* line 65 */;
			echo '</td>
            <td>
                | <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Article:edit'));
			echo '">Edit</a>
                | <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Article:remove'));
			echo '">X</a>
                | <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Article:visible'));
			echo '">visible</a> |
            </td>
        </tr>

';

		}

		echo '    </table>

    </div>
    </div>
</div>

';
	}


	/** {block head} on line 3 */
	public function blockHead(array $ʟ_args): void
	{
		echo '      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
';
	}


	/** n:block="title" on line 8 */
	public function blockTitle(array $ʟ_args): void
	{
		echo '   <h1 class="test-center alert alert-success">Adding articles</h1>
';
	}
}
