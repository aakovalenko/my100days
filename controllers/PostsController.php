<?php

namespace app\controllers;

use app\components\CustomFilter;
use Yii;
use app\models\Posts;
use app\models\search\PostsSearch;
use yii\data\Pagination;
use yii\db\ActiveRecord;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostsController implements the CRUD actions for Posts models.
 */
class PostsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => CustomFilter::className(),
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],

        ];
    }

    /**
     * Lists all Posts models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new PostsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionOne($url)
    {
        if ($post = Posts::find()->andWhere(['url'=>$url])->one()){
            return $this->render('one',['post'=>$post]);
        }
            throw new NotFoundHttpException('ой нет такого поста');

    }

    public function actionAll()
    {
        $posts = Posts::find()->andWhere(['status_id'=>1])->all();
        return $this->render('all',['posts'=>$posts]);
    }

    /**
     * Displays a single Posts models.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the models cannot be found
     */
    public function actionView($id)
    {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Posts models.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Posts();
        $model->sort = 50;
        $model->author_id = Yii::$app->user->identity->id;

        $model->on(ActiveRecord::EVENT_AFTER_INSERT, function($event) {
            $followers = ['john2@teleworm.us', 'shivawhite@cuvox.de', 'kate@dayrep.com'];

            foreach($followers as $follower) {
                Yii::$app->mailer->compose()
                    ->setFrom('techblog@teleworm.us')
                    ->setTo($follower)
                    ->setSubject($event->sender->name)
                    ->setTextBody($event->sender->description)
                    ->send();
            }
            echo 'Emails has been sent';
        });


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Posts models.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the models cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Posts models.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the models cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Posts models based on its primary key value.
     * If the models is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Posts the loaded models
     * @throws NotFoundHttpException if the models cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Posts::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

//****************************************************FOR TEST**********************************************************
    public function actionRssFeed($param)
    {
        return $this->renderContent('This is RSS feed for our blog and ' . $param);
    }
    public function actionArticle($alias){
        return $this->renderContent('This is an article with alias ' . $alias);
    }
    public function actionList()
    {
        return $this->renderContent('Blog\'s articles here');
    }
    public function actionHiTech()
    {
        return $this->renderContent('Just a test of action which contains more than
one words in the name') ;
    }

    //Showing posts with alias test
    public function actionTest($alias)
    {
        return $this->renderContent(Html::tag('h2',
            'Showing post with alias ' . Html::encode($alias)
        ));
    }


    public function actionHello($name)
    {
        return $this->renderContent(Html::tag('h2',
            'Hello, ' . Html::encode($name) . '!'
        ));
    }


}
