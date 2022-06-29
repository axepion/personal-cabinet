<?php

namespace backend\controllers;

use common\models\LoginForm;
use common\models\Users;
use common\models\SignupForm;
use Yii;
use yii\data\Pagination;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\User;

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
        if (!Yii::$app->user->isGuest)
        {
            return $this->redirect('site/users');
        }
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login())
        {
            if (Users::isAdmin() != 1)
            {
                Yii::$app->user->logout();
                Yii::$app->session->setFlash('error', 'Ваша учетная запись не имеет административные права');
                return $this->goHome();
            }
            return $this->goBack();
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionUsers()
    {
        if (Users::isAdmin() != 1)
        {
            Yii::$app->session->setFlash('error', 'Вы не имеете административных прав');
            return $this->goHome();
        }
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

    public function actionUserEdit($id)
    {
        if (Users::isAdmin() != 1)
        {
            Yii::$app->session->setFlash('error', 'Вы не имеете административных прав');
            return $this->goHome();
        }
        $user = Users::findOne($id);
        if ($user->load(Yii::$app->request->post()) && $user->save())
        {
            Yii::$app->session->setFlash('success', "Профиль $user->login был изменен");
            return Yii::$app->response->redirect('users');
        }
        return $this->render('userEdit', [
           'user' => $user,
        ]);
    }

    public function actionCreate()
    {
        if (Users::isAdmin() != 1)
        {
            Yii::$app->session->setFlash('error', 'Вы не имеете административных прав');
            return $this->goHome();
        }

        $user = new SignupForm();

        if ($user->load(Yii::$app->request->post()) && $user->signup()) {
            Yii::$app->session->setFlash('success', 'Пользователь создан');
            return $this->redirect('/site/users');
        }
        return $this->render('create', [
            'user' => $user,
        ]);
    }

    public function actionDelete($id)
    {
        if (Users::isAdmin() != 1)
        {
            Yii::$app->session->setFlash('error', 'Вы не имеете административных прав');
            return $this->goHome();
        }
        $user = Users::findOne($id);
        $user->delete();
        Yii::$app->session->setFlash('warning', 'Пользователь удален');
        return $this->redirect('/site/users');
    }
}
