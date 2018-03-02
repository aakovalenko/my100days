<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * This is the models class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email'], 'required'],
            [['username', 'password', 'email'], 'string', 'max' => 255],
            [['email'],'email'],
            ['email','filter', 'filter' => 'trim'],
            ['email', 'unique', 'targetClass' => BackendUser::className(),  'message' => 'Этот email уже занят'],
            ['username', 'unique', 'targetClass' => BackendUser::className(),  'message' => 'Этот логин уже занят'],
            //[['authKey'],'string','max'=> 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
        ];
    }

    public function generateAuthKey()
    {
        $this->authKey = Yii::$app->security->generateRandomString();
    }



}
