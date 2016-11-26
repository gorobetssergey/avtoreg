<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Users;

class SiteController extends Controller
{
    public $layout = 'site';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            if(Yii::$app->user->identity->role == Users::ROLE_USER){
                return $this->redirect(Url::home(true).'cabinet/index');
            }
            elseif(Yii::$app->user->identity->role == Users::ROLE_ADMIN)
            {
                return $this->redirect(Url::home(true).'admin/index');
            }
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if(Yii::$app->user->identity->role == Users::ROLE_USER){
                return $this->redirect(Url::home(true).'cabinet/index');
            }
            elseif(Yii::$app->user->identity->role == Users::ROLE_ADMIN)
            {
                return $this->redirect(Url::home(true).'admin/index');
            }
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionReg()
    {
        $model = new Users(['scenario' => 'registration']);

        if(Yii::$app->request->isPost)
        {
            $post = Yii::$app->request->post();
            if($model->load($post) && $model->validate()):
                if($user = $model->reg()):
                    if($user->active === Users::STATUS_ACTIVE ):
                        if(Yii::$app->getUser()->login($user)):
                            return $this->redirect('/cabinet/profile');
                        endif;
                    endif;
                endif;
            endif;
        }

        return $this->render('reg',[
            'model' => $model
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
