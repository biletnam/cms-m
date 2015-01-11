<?php


class DefaultController extends FrontEndController
{
    /**
     * @var string псевдоним пути к папке с файлами для индексирования
     */
    private $_indexFiles = 'runtime.search';

    public $category = 0;
    public $brand = 0;
    public $selectionParameters = array();

    public function actionIndex()
    {
        if (($term = Yii::app()->getRequest()->getParam('q', null)) !== null) {
            Yii::import('application.modules.catalog.models.*');

            Zend_Search_Lucene_Analysis_Analyzer::setDefault(new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive());
            Zend_Search_Lucene_Analysis_Analyzer::setDefault(new Zend_Search_Lucene_Analysis_Analyzer_Common_TextNum_CaseInsensitive());
            Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding('UTF-8');

            $index = Zend_Search_Lucene::open(Yii::getPathOfAlias('application.' . $this->_indexFiles));
            $query = Zend_Search_Lucene_Search_QueryParser::parse($term);
            $results = $index->find($query);
            
            $productIds = array();
            foreach ($results as $result) {
                $productIds[]=$result->id_product;
            }
            $criteria = new CDbCriteria;
            $criteria->condition = '(hide=0 OR hide is NULL)';

            if ($productIds)
                $criteria->compare('id', $productIds);
            else
                $criteria->compare('id', 0);

            $productProvider = new CActiveDataProvider('CatalogProduct', array(
                'criteria' => $criteria,
                'pagination' => array(
                    'pageSize' => 12,
                ),
            ));
            $this->render('index', array(
                'term' => $term,
                'query' => $query,
                'productProvider' => $productProvider,
            ));
            //echo '<pre>'. print_r($results, true) .'</pre>';
//             $array_ids=array();
//            $scores=array();
            /*$product=array();
            $category=array();
            $i=0;
            foreach($results as $result){
                $item['id']=$i++;
                $item['title']=$result->title;
                $item['link']=$result->link;

                //позиция слова в описании
                $pos=mb_stripos($result->description,$term,0,"utf-8");
                //длина описания
                $descr_len=mb_strlen($result->description,"utf-8");
                //длина искомого слова
                $term_len=mb_strlen($term,"utf-8");
                //префикс и постфикс для описания
                $prefix='';$postfix='';
                $end=false;

                if ($pos+$term_len<=200) {
                    $pos=0;
                    if ($result->description!='') $end=true;
                } else {
                    if ($pos+$term_len+100>=$descr_len) {
                        $pos=$descr_len-200;
                    } else {
                        $pos-=100;
                        $end=true;
                    }
                }
                //позиция последнего пробела
                $last_pr=200;
                if ($end) {
                    $last_pr=mb_strripos(mb_substr($result->description,$pos,200,"utf-8"),' ',0,"utf-8");
                    $postfix='...';
                }
                //отрезаем по последнему пробелу
                $descr=trim(mb_substr($result->description,$pos,$last_pr,"utf-8"), '\,');

                //позиция первого пробела
                $first_pr=0;
                if ($pos) {
                    $first_pr=mb_stripos(mb_substr($descr,0,200,"utf-8"),' ',0,"utf-8")+1;
                    $prefix='...';
                }
                //отрезаем по первому пробелу
                $descr=trim(mb_substr($descr,$first_pr,200,"utf-8"), '\,');

                $search_array=array();
                $search_array[]=$term;
                $search_array[]=mb_strtolower($term,'utf-8');
                $search_array[]=mb_strtoupper($term,'utf-8');
                $search_array[]=mb_strtoupper(mb_substr($term,0,1,'utf-8'),'utf-8').mb_strtolower(mb_substr($term,1,$term_len-1,'utf-8'),'utf-8');

                $replace_array=array();

                foreach($search_array as $key=>$value) $replace_array[$key]="<b>".$value."</b>";
                //подсвечиваем искомые слова
                $descr=str_replace($search_array,$replace_array,$descr);

                $item['description']=$prefix.$descr.$postfix;
                //if ($result->type=="usl")
                    $product[]=$item;
                //else
                //	$category[]=$item;
            }*/
//            foreach($results as $result){
//                 $array_ids[]=$result->id_product;
//                 $scores[$result->id_product]=$result->score;
//				 $links[$result->id_product]=$result->link;
//            }

            /* $products_sorted=array();
             // Если что-то найдено
             if(!empty($array_ids)){
                 // Выбираем из базы найденные продукты
                 Yii::import('application.modules.catalog.models.*');
                 $criteria=new CDbCriteria;
                 //$criteria->condition='(hide=0 OR hide is NULL)';
                 $criteria->compare('id', $array_ids);

                 $products=CatalogProduct::model()->findAll($criteria);
                 foreach($products as $product){
                     $product->sort_order=$scores[$product->id];
					 $product->link=$links[$product->id];
                     $products_sorted[]=$product;
                 }

                 uasort($products_sorted,"mySort");
             }*/


            /*$dataProvider=new CActiveDataProvider('CatalogProduct', array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>20,
                ),
            ));*/

            /*$productsProvider = new CArrayDataProvider($products, array(
                'pagination' => array(
                    'pageSize' => 20,
                ),
            ));
            $this->render('index', array(
                'term' => $term,
                'productsProvider' => $productsProvider
            ));*/

            /*$categoryProvider=new CArrayDataProvider($category, array(
                'pagination'=>array(
                    //'pageSize'=>20,
                ),
            ));*/


        }

    }

    public function actionCreate()
    {

        Zend_Search_Lucene_Analysis_Analyzer::setDefault(new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive());

        $index = Zend_Search_Lucene::create(Yii::getPathOfAlias('application.' . $this->_indexFiles));

        $pages = Pages::model()->findAll();
        foreach ($pages as $page) {
            $doc = new Zend_Search_Lucene_Document();

            $doc->addField(Zend_Search_Lucene_Field::Text('title',
                $page->title, 'UTF-8')
            );

            $doc->addField(Zend_Search_Lucene_Field::Text('link',
                '/' . $page->link, 'UTF-8')
            );

            $doc->addField(Zend_Search_Lucene_Field::Text('content',
                $page->content, 'UTF-8')
            );


            $index->addDocument($doc);
        }
        $index->commit();
        echo 'Lucene index created';
    }

    // Функция вывода примера текста с подсветкой вхождений найденных слов
    // $string - исходный текст, $query - запрос, $length - длина результирующего текста
    // $preroll - количество символов, которые надо показать перед первым вхождением
    // Если $length и $preroll не указаны или указаны -1 - возвращается весь текст
    protected function lightFound($string, $query, $length = -1, $preroll = 0)
    {

        $query = trim($query);

        // Определяем позицию первого вхождения запроса
        $first_position = utf8_istrpos($string, $query);

        // Формируем паттерн для поиска вхождений
        $pattern = '/(' . preg_quote($query, "/");

        // Разбиваем запрос на слова
        $words = explode(' ', $query);
        foreach ($words as $word) {
            $word = trim($word);
            if ($word <> '') {
                $pattern .= '|' . preg_quote($word, "/");

                // Если первое вхождение еще не определено - определяем
                if ($first_position === false) {
                    $first_position = utf8_istrpos($string, $word);
                }
            }
        }

        $pattern .= ')/ui';


        // Если первое вхождение все еще не определено - берем строку сначала
        if ($first_position === false) $first_position = 0;
        if ($first_position - $preroll > 0) {
            $begin = $first_position - $preroll;
        } else {
            $begin = 0;
        }

        // Если задана длина - обрезаем строку
        if ($length > 0) {
            $string = '...' . utf8_substr($string, $begin, $length) . '...';
        }

        // Находим вхождения запроса и его частей
        preg_match_all($pattern, $string, $mass_words, PREG_OFFSET_CAPTURE);
        // Разделяем текст на части без учета вхождений
        $others_pieces = preg_split($pattern, $string, -1, PREG_SPLIT_OFFSET_CAPTURE);

        // К каждой части добавляем соответствующее вхождение с выделением
        // И записываем все в результирующий массив
        foreach ($others_pieces as $key => $others_piece) {
            if (isset($mass_words[0][$key])) {
                $new_string_array[] = $others_piece[0] . '<b>' . $mass_words[0][$key][0] . '</b>';
            } else {
                $new_string_array[] = $others_piece[0];
            }
        }

        // Собираем строку из массива
        $result_string = implode('', $new_string_array);

        return $result_string;
    }
}