<?
class BaseArticlesController extends FrontEndController
{
    public $articles_config;

    public function __construct($id,$module=null)
    {
        parent::__construct($id, $module);

        // загружаем конфигурацию статей
        $this->articles_config=ArticlesConfig::model()->findByPk(1);
    }

}
?>