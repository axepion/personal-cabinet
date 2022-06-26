<?php

namespace backend\controllers;

use common\models\LoginForm;
use common\models\Users;
use Yii;
use yii\data\Pagination;
use yii\helpers\VarDumper;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login())
        {
            return $this->goBack();
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionUsers()
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

        return $this->render('users', [
            'users' => $users,
            'pagination' => $pagination,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
