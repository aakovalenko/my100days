<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\assets\AdminAsset;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;

AdminAsset::register($this);

?>
<div class="posts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['models' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Posts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            [
              'attribute' => 'text',
                'value' => function ($model) {
                    return \yii\helpers\StringHelper::truncate($model->text, 100);

                },

],
            'picture',
            'date_create:datetime',
            //'date_update',
            //'url:url',
            //'status_id',
            //'sort',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view}'
            ],
        ],
    ]); ?>

</div>

<?php
echo '<br>';
echo "TASK #1";

$arr = [0, 2, 3, 3, 3, 4, 5, 6, 6];

print_r(array_count_values($arr));







