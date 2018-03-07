<?php

use app\models\Posts;
/* @var $this yii\web\View */

$this->title = 'My 100 Days';

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>My 100 days</h1>

       <!-- <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
    </div>

    <div class="body-content">

        <div class="row">

                <?php foreach ($posts as $post): ?>
            <div class="col-lg-12">
                <h2><?=$post->title; ?></h2>
                <p><?=\yii\helpers\StringHelper::truncate($post->text,150,'...'); ?>
                    <?= \yii\helpers\Html::a('Подробнее', ['posts/one', 'url' => $post->url], ['class' => 'profile-link']) ?>
                </p>
                <hr>

            </div>
                <?php endforeach;?>


        </div>

    </div>
</div>
