<?php

use Latte\Runtime as LR;

/** source: /var/www/blog.albertpatera.cz/app/presenters/templates/Article/edit.latte */
final class Templateee35194295 extends Latte\Runtime\Template
{
	public const Blocks = [
		['content' => 'blockContent', 'head' => 'blockHead', 'body' => 'blockBody'],
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
			foreach (array_intersect_key(['item' => '11'], $this->params) as $ʟ_v => $ʟ_l) {
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
		echo "\n";
		$this->renderBlock('body', get_defined_vars()) /* line 9 */;
	}


	/** {block head} on line 3 */
	public function blockHead(array $ʟ_args): void
	{
		echo '        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
';
	}


	/** {block body} on line 9 */
	public function blockBody(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '        <div class="bg-light">
';
		foreach ($articleValue as $item) /* line 11 */ {
			if ($item->url) /* line 12 */ {
				echo '                <div class="row pl-5">
                    <div class="col-lg-8 float-md-right">
                        <div class="alert bg-white">
';
				if ($item->title_image == null) /* line 16 */ {
					echo '                                <img src="http://www.avenuemagazine.com/wp-content/themes/avenue-magazine-new/images/no-image-available.png"
                                     alt="no_image" style="width: 100%; height:350px;">
                           		
				 ';
				} else /* line 20 */ {
					echo ' <img class="title-image img-thumbnail" title="';
					echo LR\Filters::escapeHtmlAttr($item->title_image) /* line 20 */;
					echo '" alt="';
					echo LR\Filters::escapeHtmlAttr($item->title_image) /* line 20 */;
					echo '" src="';
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($item->title_image)) /* line 20 */;
					echo '" style="width: 100%; height:350px;">';
				}
				echo '
                            <article class="article-wrapper">';
				echo $item->description /* line 21 */;
				echo '</article>
                        </div>
                    </div>

                </div>

';
			} else /* line 27 */ {
				echo "\n";
			}

		}

		echo '

        </div>
';
	}
}
