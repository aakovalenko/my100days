<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Posts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'title',
              [
                    'attribute' => 'text',
                'value' => function ($model) {
                    return \yii\helpers\StringHelper::truncate($model->text, 150);
                }
            ],
            'picture',
            'date_create:date',
            //'date_update',
            //'url:url',
            [
                    'attribute' => 'status_id',
                    'value' => function ($model) {
                        if ($model->status_id == 1){
                            return Html::button('On', ['class' => 'btn btn-success btn-sm']);
                        } else {
                            return Html::button('Off', ['class' => 'btn btn-danger btn-sm']);
                        }
                    },
                    'format' => 'raw',
            ],

            //'sort',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
