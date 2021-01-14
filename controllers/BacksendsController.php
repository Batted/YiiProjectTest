<?php

namespace app\controllers;

use Yii;
use app\models\Feedback;
use yii\web\Controller;
use yii\data\ActiveDataProvider;


class BacksendsController extends Controller {
    

    public function actionAdd(){
        $model = new Feedback();
        if ( $model-> load(Yii::$app->request->post()) ) { //Если передалось
            if ($model->save()){
                return $this->redirect(['view', 'id'=>$model->id]);
            }
        }
        return $this->render('sends_edit',['model'=>$model]);
    }

    public function actionView($id){
        $model = Feedback::findOne(['id'=>intval($id)]); // intval - конвертация в число (целое), если false = 0
        if (!$model) {
            throw new \Exception('Модель отсутсвует.');
        }
        return $this->render('sends_view',['model'=>$model]);
    }

    public function actionUpdate($id){
        $model = Feedback::findOne($id);
        if ($model-> load(Yii::$app->request->post()) ) {
            $model->save();
            return $this->redirect(['grid_sends', 'id'=>$model->id]);
        }
        return $this->render('sends_edit', ['model'=>$model]);
    }

    public function actionIndex(){
        $dataProvider = new ActiveDataProvider([
            'query' => Feedback::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('grid_sends',['dataProvider'=>$dataProvider]);
    }
}