<?php

namespace frontend\controllers;

use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use common\models\Users;

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
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);

    }
}