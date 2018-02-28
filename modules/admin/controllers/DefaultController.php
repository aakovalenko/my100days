<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 28.02.18
 * Time: 11:38
 */

namespace app\modules\admin\controllers;


use yii\web\Controller;

class DefaultController extends Controller
{
  public function actionIndex()
  {
      return $this->render('index');
  }
}