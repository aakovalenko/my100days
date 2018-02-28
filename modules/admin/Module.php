<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 28.02.18
 * Time: 11:35
 */

namespace app\modules\admin;

use yii\base\Module as BaseModule;

class Module extends BaseModule
{
    public $layout = '@admin/views/layouts/main';
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        \Yii::setAlias('admin', dirname(__FILE__));
    }
}