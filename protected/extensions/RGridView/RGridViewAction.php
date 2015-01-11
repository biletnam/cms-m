<?php

/**
 * RGridViewAction class file.
 *
 * @author Slava Rudnev <slava.rudnev@gmail.com>
 * @link https://github.com/RSol/RGridView
 */

/**
 * RGridViewAction store the ordered models.
 *
 * To use RGridViewAction add it in your controller:
 * <pre>
 * public function actions()
 * {
 *     return array(
 *             'order' => array(
 *             'class' => 'ext.RGridView.RGridViewAction',
 *             'model' => 'Model',
 *             'orderField' => 'order',
 *         ),
 *     );
 * }
 * </pre>
 *
 * Additional 
 * 
 * @author Slava Rudnev <slava.rudnev@gmail.com>
 * @version 0.1
 * Доработка напильником - Алексей Горячев (HotAlex)
 */

class RGridViewAction extends CAction
{
	public $model = 'Model';

	public $orderField = 'order';

	public function run()
	{
		$ansver = array('msg'=>'Data not sended');
		
		if(isset($_POST['Order']))
		{
			$models = explode(',', $_POST['Order']);
			$models = array_filter($models);

            $orderModel = CActiveRecord::model($this->model);
            if(count($models)>0){

                // достаем старые значения поля сортировки
                $where='('.$_POST['Order'].')';

                $sql="SELECT ".$orderModel->getMetaData()->tableSchema->primaryKey.", ".$this->orderField." FROM ".$orderModel->tableName()." WHERE ".$orderModel->getMetaData()->tableSchema->primaryKey." IN ".$where;
                $dataReader=Yii::app()->db->createCommand($sql)->query();

                // И записываем в массив
                foreach($dataReader as $row) {
                    $order_old[$row[$orderModel->getMetaData()->tableSchema->primaryKey]]=$row[$this->orderField];
                }

                // Сортируем массив
                asort($order_old);
                reset($order_old);

                // Формируем массив, где ключ - порядок, значение - id
                foreach($models as $key=>$value){
                    $order_new=each($order_old);
                    $models2[$order_new['value']]=$value;
                }

                foreach($models2 as $order => $id)
                {
                    Yii::app()->db->createCommand()
                        ->update($orderModel->tableName(), array(
                            $this->orderField =>$order,
                        ), $orderModel->getMetaData()->tableSchema->primaryKey.'=:range_id', array(
                            ':range_id' => $id,
                        ));
                }

            }
			
			$ansver = array('msg'=>'Ok');
		}
		echo CJSON::encode($ansver);
		Yii::app()->end();
	}
}