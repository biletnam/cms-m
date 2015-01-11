<?php

Yii::import('zii.widgets.CWidget');
Yii::import('application.modules.user.models.CatalogCategory');
/*
 *Класс виджета для вывода категорий на главную страницу
 *
*/
class CatalogCategoryWidget extends CWidget {

	public function	run() {

        // устанавливаем условие для отбора
        $criteria=new CDbCriteria;
        $criteria->order='id ASC';
        //$criteria->compare('id_category', 0);
        $dataProvider = new CActiveDataProvider('CatalogCategory', array(
            'criteria'=>$criteria,
            'pagination'=>false,
        ));
        $data = array();
        $categories = $dataProvider->getData();
        foreach($categories as $category)
        {
            if($category->id_category == 0)
                $data[] = $category;
            foreach($categories as $categ)
            {
                if($categ->id_category == $category->id)
                {
                    $data[] = $categ;
                }
            }
        }
        $this->render('catalogcategory',array(
            'categories'=>$this->getCats($categories), //$data
        ));

        return parent::run();
	}

    public function getCats($res){
        $levels = array();
        $tree = array();
        $cur = array();
        foreach($res as $row){
            $cur = &$levels[$row->id];
            $cur['id_category'] = $row->id_category;
            $cur['title'] = $row->title;
            $cur['link'] = $row->link;
            $cur['id'] = $row->id;

            if($row->id_category == 0){
                $tree[$row->id] = &$cur;
            }
            else{
                $levels[$row->id_category]['children'][$row->id] = &$cur;
            }

        }
        return $tree;
    }
}
?>
