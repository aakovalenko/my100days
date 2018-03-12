<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 12.03.18
 * Time: 15:42
 */

namespace app\controllers;


use yii\web\Controller;

class TestController extends Controller
{
    public function actionUrls()
    {
        return $this->render('urls');
    }
}