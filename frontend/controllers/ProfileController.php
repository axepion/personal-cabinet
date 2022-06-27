<?php
namespace frontend\controllers;

use Yii;
use yii\base\Controller;
use common\models\Users;
use yii\helpers\VarDumper;


class ProfileController extends Controller
{
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest)
        {
            $user = Users::find()->where(['id' => Yii::$app->user->id])->one();
            return $this->render('index', [
                'user' => $user,
            ]);
        }
        return $this->goHome();
    }

    public function actionEdit()
    {
        $user = Users::findOne(Yii::$app->user->getId());

        if ($user->load(Yii::$app->request->post()) && $user->save())
        {
            Yii::$app->session->setFlash('success', 'Профиль был изменен');
            return Yii::$app->response->redirect('/profile');
        }
        return $this->render('edit', [
            'user' => $user,
        ]);
    }
}
