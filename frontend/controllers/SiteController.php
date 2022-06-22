<?php

namespace frontend\controllers;

use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use common\models\Users;
use common\models\LoginForm;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $query = Users::find();

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $users = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'users' => $users,
            'pagination' => $pagination,
        ]);
    }

    public function actionUser()
    {
        $user = Users::find()->where(['id' => Yii::$app->request->get()['id']])->one();
        return $this->render('user', [
            'user' => $user,
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login())
        {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /*Secret function :)*/
    public function actionAddAdmin()
    {
        $model = Users::find()->where(['login' => 'admin'])->one();
        if (empty($model)) {
            $user = new Users();
            $user->login = 'admin';
            $user->setPassword('admin');
            $user->generateAuthKey();
            $user->save();
            if ($user->save()) {
                echo 'good';
            }
        }
    }
}