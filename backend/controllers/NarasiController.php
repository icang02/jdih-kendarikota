<?php

namespace backend\controllers;

use Yii;
use backend\models\Narasi;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * NarasiController implements the CRUD actions for Narasi model.
 */
class NarasiController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Narasi models.
     * @return mixed
     */
    // public function actionIndex()
    // {
    //     $searchModel = new NarasiSearch();
    //     /*
    //     $searchModel = new NarasiSearch(['id'=>\Yii::$app->user->identity->direktorat_id]);
    //     $dataProvider->query->andWhere(['id'=>[2,3,4]]);
    //     */
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //     return $this->render('index', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }


    /**
     * Updates an existing Narasi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
        $model = Narasi::findOne(1);
        // if ($pengunjung->hari != date('Y-m-d'))
        //     $pengunjung->jumlah_perhari = 1;
        // else
        //     $pengunjung->jumlah_perhari = $pengunjung->jumlah_perhari + 1;

        // if ($pengunjung->bulan != date('Y-m'))
        //     $pengunjung->jumlah_bulan = 1;
        // else
        //     $pengunjung->jumlah_bulan = $pengunjung->jumlah_bulan + 1;

        // $pengunjung->hari = date('Y-m-d');



        // $pengunjung->jumlah_keseluruhan = $pengunjung->jumlah_keseluruhan + 1;

        // $pengunjung->save();

        // $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->text = Yii::$app->request->post('Narasi')['text'];
            $model->save();
            // echo '<pre>';
            // print_r(Yii::$app->request->post('Narasi')['text']);
            // echo '</pre>';
            // die;
            Yii::$app->session->setFlash('success', 'Data Narasi berhasil diubah');
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
}
