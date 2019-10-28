<?php

namespace app\controllers;

use Yii;
use app\models\db\TelebotConfiguration;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * TelebotConfigurationController implements the CRUD actions for TelebotConfiguration model.
 */
class TelebotConfigurationController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TelebotConfiguration models.
     * @return mixed
     */
    /**
     * Lists all Configuration models.
     * @return mixed
     */
    public function actionIndex()
    {
        $models = TelebotConfiguration::find()->all();

        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post('TelebotConfiguration');
            foreach ($models as $model) {
                if (isset($post[$model->type])) {
                    $model->value = $post[$model->type];
                    $model->save();
                }
            }
        }

        return $this->render('index', [
            'models' => $models,
        ]);

    }
}
