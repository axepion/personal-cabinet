<?php

namespace frontend\controllers;

use yii\helpers\Url;
use Yii;
use yii\data\Pagination;
use yii\helpers\VarDumper;
use yii\web\Controller;
use common\models\Users;
use common\models\LoginForm;
use frontend\models\SignupForm;

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

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Вы успешно зарегистрированы. Войдите под своими данными');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionUser()
    {
        $user = Users::find()->where(['id' => Yii::$app->request->get()['id']])->one();

        return $this->render('user', [
            'user' => $user,
        ]);
    }

    public function actionAdmin()
    {
        return $this->redirect(Yii::$app->urlManagerBackend->createAbsoluteUrl(['site/index']));
    }

}
