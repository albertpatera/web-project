<?php

namespace App\Presenters;

use App\Model\ArticleManager;
use App\Model\HomepageManager;
use App\Model\UserManager;
use App\Model\DatabaseManager;
use Nette;
use Nette\ComponentModel\IComponent;
use Nette\Utils\ArrayHash;

final class TestPresenter extends Nette\Application\UI\Presenter
{
    public function renderDefault()
    {
    }

    protected function createComponentTexyForm()
    {
        $art = new Nette\Application\UI\Form();
        $art->addTextArea('input', 'Filling');
        $art->addSubmit('submit', 'Send to public');
        $art->onSuccess[] = [$this, 'addTexyEditor'];
        return $art;
    }

    public function output($text)
    {
        $texy = new \Texy\Texy();


// other OPTIONAL configuration
        $texy->imageModule->root = 'images/';  // specify image folder
        $texy->allowed['phrase/ins'] = true;
        $texy->allowed['phrase/del'] = true;
        $texy->allowed['phrase/sup'] = true;
        $texy->allowed['phrase/sub'] = true;
        $texy->allowed['phrase/cite'] = true;
        // processing
        //$text = file_get_contents('syntax.texy');
        $text = '**albertpatera**';
        $output = $texy->process("*albert*");  // that's all folks!
        echo $output;
        dump($output);
        // echo formated output
        header('Content-type: text/html; charset=utf-8');
        //echo $html;
        // and echo generated HTML code
        echo '<hr />';
        echo '<pre>';
        // echo htmlspecialchars([$values]);
        echo '</pre>';
    }

    public function addTexyEditor(Nette\Application\UI\Form $art, Nette\Utils\ArrayHash $values)
    {
        $texy = new \Texy\Texy();


// other OPTIONAL configuration
        $texy->imageModule->root = 'images/';  // specify image folder
        $texy->allowed['phrase/ins'] = true;
        $texy->allowed['phrase/del'] = true;
        $texy->allowed['phrase/sup'] = true;
        $texy->allowed['phrase/sub'] = true;
        $texy->allowed['phrase/cite'] = true;
        // processing
        //$text = file_get_contents('syntax.texy');
        $text = '**albertpatera**';
        $output = $texy->process($text);  // that's all folks!
        echo $output;
        dump($output);
        // echo formated output
        header('Content-type: text/html; charset=utf-8');
        //echo $html;
        // and echo generated HTML code
        echo '<hr />';
        echo '<pre>';
        // echo htmlspecialchars([$values]);
        echo '</pre>';
    }
}

