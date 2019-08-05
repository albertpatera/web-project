<?php

namespace App\Presenters;

use App\Model\ArticleManager;
use App\Model\HomepageManager;
use App\Model\UserManager;
use Nette;
use Nette\ComponentModel\IComponent;


final class HomepagePresenter extends Nette\Application\UI\Presenter
{

    /**
     * @var UserManager @inject
     */
    public $userValue;
    /**
     * @var ArticleManager @inject
     */
    public $articleValue;

    /**
     * @var HomepageManager @inject
     */
    public $websiteElementValueHeader;

    /**
     * @var HomepageManager @inject
     */
    public $websiteElementValueFooter;

    public function renderWebComp()
    {
        $website = $this->websiteElementValueHeader->getElementHeader();

        try {
            $this->websiteElementValueHeader->getElementHeader();
        } catch (\Exception $e) {
            throw new \Exception("fff" . $e->getMessage());
        }

        $this->getTemplate()->websiteElementValue = $website;
    }
    public function renderWww()
    {
        $article = $this->articleValue->getArticles();
        $this->getTemplate()->articleValue = $article;
        try {
            $userValue = $this->userValue->getUserToHp();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        $this->getTemplate()->userValue = $userValue;

        if (!($article = $this->articleValue->getArticles())) {
            $this->error("here is noot working :("); // Vyhazuje výjimku BadRequestException.
        }
        try {
            $userValue = $this->userValue->getUserToHp();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }


        try {
            $article = $this->articleValue->getArticles();
            if (!($userValue = $this->userValue->getUserToHp())) {
                $this->error("Here is not working :( !"); // Vyhazuje výjimku BadRequestException.
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        //render for header and footer tag elements

        $website = $this->websiteElementValueHeader->getWebsiteElement();

        try {
            $this->websiteElementValueHeader->getWebsiteElement();
        } catch (\Exception $e) {
            throw new \Exception("fff" . $e->getMessage());
        }

        $this->getTemplate()->websiteElementValueHeader = $website;
    }

    protected function createComponentAddElement()
    {
        $form = new Nette\Application\UI\Form();
        $form->addText('main_title', 'Main_title:')->setRequired();
        $form->addText('title_image', 'Main Header Imge:')->setRequired();
        $form->addSubmit('sbmtEl', 'Add Elememnt');
        $form->onSuccess[] = [$this, 'addingElementSuccessed'];

        return $form;
    }

    public function addingElementSuccessed(Nette\Application\UI\Form $form, array $values)
    {

       $web_header = $this->websiteElementValueHeader->getElementHeader();
       $this->getTemplate()->websiteElementValueHeader = $web_header;

       $web_footer = $this->websiteElementValueFooter->getElementFooter();
       $this->getTemplate()->websiteElementValueFooter = $web_footer;

    }
}
