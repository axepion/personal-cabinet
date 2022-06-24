<?php

namespace frontend\controllers;

use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use common\models\Users;
use frontend\models\LoginForm;
use frontend\models\SignupForm;
use frontend\models\ProfileEdit;

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

    public function actionProfile()
    {
        if (!Yii::$app->user->isGuest)
        {
            $user = Users::find()->where(['id' => Yii::$app->user->id])->one();
            return $this->render('user', [
                'user' => $user,
            ]);
        } else {
            return $this->goHome();
        }
    }

    public function actionEdit()
    {
        $model = new ProfileEdit();
        return $this->render('edit', [
            'model' => $model,
        ]);
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
