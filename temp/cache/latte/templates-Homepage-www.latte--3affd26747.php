<?php

use Latte\Runtime as LR;

/** source: /var/www/blog.albertpatera.cz/app/presenters/templates/Homepage/www.latte */
final class Template3affd26747 extends Latte\Runtime\Template
{
	public const Blocks = [
		['content' => 'blockContent', 'head' => 'blockHead', 'body' => 'blockBody', 'header' => 'blockHeader'],
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
			foreach (array_intersect_key(['item' => '16', 'userOutput' => '52'], $this->params) as $ʟ_v => $ʟ_l) {
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
		$this->renderBlock('body', get_defined_vars()) /* line 10 */;
	}


	/** {block head} on line 3 */
	public function blockHead(array $ʟ_args): void
	{
		echo '        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	 <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
';
	}


	/** {block body} on line 10 */
	public function blockBody(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('header', get_defined_vars()) /* line 11 */;
		echo '
        <div class="bg-light">
';
		foreach ($iterator = $ʟ_it = new Latte\Essential\CachingIterator($articleValue, $ʟ_it ?? null) as $item) /* line 16 */ {
			echo '   
		 <div class="row pl-5">
                        <div class="col-lg-8 float-md-right" >
                            <div class="card bg-white  d-inline-block col-ml-8" style="width: 80%">
                                <div class="">
';
			if ($item->title_image == null) /* line 22 */ {
				echo '                                    <img src="https://www.avenuemagazine.com/wp-content/themes/avenue-magazine-new/images/no-image-available.png"
                                    alt="no_image" style="width: 100%;;">
						
                                ';
			} else /* line 26 */ {
				echo ' <img class="card-img-top img-fluid" title="';
				echo $item->title_image /* line 26 */;
				echo '" alt="';
				echo $item->title_image /* line 26 */;
				echo '" src="';
				echo LR\Filters::safeUrl($item->title_image) /* line 26 */;
				echo '" style="width: 100%; height:350px;">';
			}
			echo '
                                <h3 class="card-title  text-center text-block">
                                ';
			echo $item->username /* line 28 */;
			echo '
				</h3>
				</div>
                                <article class="article-wrapper card-body">';
			echo $item->description /* line 31 */;
			echo '</article>
                                <hr>
				<div class="card-footer">
                                <h6 class="date">Vytvořeno dne: </h6>
                                <table class="table">
					<tr>
						sekce <td>:<label class="text-center badge badge-primary text-white"><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Article:edit', [$item->url]));
			echo '" class="menu-link text-white "><small>';
			echo LR\Filters::escapeHtmlText(($this->filters->upper)($item->url)) /* line 37 */;
			echo '</a></small></label>
							</td>
						<td>Vytvořeno dne:
                                <label class="badge badge-primary text-white">';
			echo LR\Filters::escapeHtmlText(($this->filters->date)($item->date_created, 'd .m. Y')) /* line 40 */;
			if (!$iterator->isLast()) /* line 40 */ {
			}
			echo '</label>

						</td>						
		
					</tr>
					
				</table>

                            		</div>
				</div>
                        </div>
                        <div class="col-lg-4">
';
			foreach ($userValue as $userOutput) /* line 52 */ {
				echo '                                <div class="card d-inline-block" style="width:70%;margin:20px 0 24px 0">
                                    <img class="img-fluid" src="';
				echo LR\Filters::safeUrl($userOutput->prof_image) /* line 54 */;
				echo '">
                                    <div class="card-body">

                                        <h4 class="card-title">';
				echo LR\Filters::escapeHtmlText(($this->filters->upper)($userOutput->username)) /* line 57 */;
				echo '</h4>
                                        <label class="badge badge-secondary">';
				echo LR\Filters::escapeHtmlText($userOutput->role) /* line 58 */;
				echo '</label>
                                        <p class="card-text"><a href="#">';
				echo LR\Filters::escapeHtmlText($userOutput->url) /* line 59 */;
				echo '</a></p>
                                        <div class="text-muted text-center" style="font-family:Courier New; ">';
				echo $userOutput->sign /* line 60 */;
				echo '</div>
					<a href="javascript:void(0)" class="btn btn-primary btn-lg p-1 ml-3 mt-5">Read more about me ..</a>

                                    </div>
                                </div>
';

			}

			echo '                        </div>
                    </div>
';

		}
		$iterator = $ʟ_it = $ʟ_it->getParent();

		echo '	
';
		$this->createTemplate('footer.latte', $this->params, 'include')->renderToContentType('html') /* line 70 */;
		echo '        </div>
';
	}


	/** {block header} on line 11 */
	public function blockHeader(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		$this->createTemplate('header.latte', $this->params, 'include')->renderToContentType('html') /* line 12 */;
	}
}
