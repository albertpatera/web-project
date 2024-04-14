<?php

use Latte\Runtime as LR;

/** source: /var/www/blog.albertpatera.cz/app/presenters/templates/Homepage/header.latte */
final class Template897c2bb2ac extends Latte\Runtime\Template
{

	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<link rel="shortcut icon" href="https://upload.albertpatera.cz/me.png">

<style>
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
.bg-light {
	z-index: 1!important;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sticky-js/1.2.2/sticky.min.js"></script>


<script>
	$(document).ready(function() {
		new Sticky(\'.navbar\'); // and that\'s all
});

</script>
';
		foreach ($websiteElementValueHeader as $page_header) /* line 36 */ {
			echo '
    <div class="container_header">
        <img src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($page_header->title_image)) /* line 39 */;
			echo '" class="img-fluid" alt="untitle image" style="width:100%; height: 750px">
        <div class="text-block">
            <h4 class="display-5">';
			echo ($this->filters->upper)($page_header->main_title) /* line 41 */;
			echo '</h4>
            <p>';
			echo $page_header->perex /* line 42 */;
			echo '</p>
        </div>
    </div>
';

		}

		$this->createTemplate('menu.latte', $this->params, 'include')->renderToContentType('html') /* line 46 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['page_header' => '36'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}
}
