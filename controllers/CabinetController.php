<?php

namespace app\controllers;


use app\models\globals\UploadImages;
use app\models\Locality;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\globals\GlobalTables;
use app\models\globals\UploadForm;
use app\models\Items;
use app\models\Moderation;
use app\models\ModerationMistake;
use app\models\Users;
use Yii;
use yii\helpers\Url;
use app\models\Profile;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CabinetController extends Controller
{
    public $layout = 'cabinet';

    public function behaviors() {
        if(Yii::$app->user->identity->role==Users::ROLE_USER) {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'actions' => [
                                'index', 'profile'
                            ],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ];
        }else{
            return [
                'access' => [
                    'rules' => [
                        [
                            'actions' => [],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
            ];
        }
    }

    public function actionIndex()
    {
        $user = Users::id();
        return $this->render('index');
    }

    public function actionProfile()
    {
        $modelProfile = $this->findProfile(Users::id());
        if($modelProfile):
            $modelProfile->setScenario('edit');
            if(Yii::$app->request->post()):
                $post = Yii::$app->request->post();
                if($modelProfile->load($post) && $modelProfile->update()):
                    Yii::$app->getSession()->setFlash('profile_successfully', ['text' => 'Успешно. Профиль успешно отредактирован','color' => 'alert-success']);
                    return $this->redirect(Url::toRoute('index'));
                else:
                    Yii::$app->getSession()->setFlash('profile_successfully' , ['text' => 'Ошибка!!! редактирования не сохранено или нет изменений', 'color' => 'alert-danger']);
                endif;
            endif;
            return $this->render('profile',[
                'model' => $modelProfile,
                'ownership' => $modelProfile->getOwnership(),
                'self_ownership' => Yii::$app->user->identity->profiles[0]['ownership0']->value
            ]);
        endif;
        return $this->render('profile',[
            'model' => $modelProfile
        ]);
    }

    public function findProfile($id)
    {
        $model = Profile::findOne(['user_id' => $id]);
        if ($model !== null) {
            return $model;
        } else {
            return (new Profile());
        }
    }
}
