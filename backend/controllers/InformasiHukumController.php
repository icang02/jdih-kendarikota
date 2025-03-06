<?php

namespace backend\controllers;

use Yii;
use backend\models\InformasiHukum;
use backend\models\InformasiHukumSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * InformasiHukumController implements the CRUD actions for InformasiHukum model.
 */
class InformasiHukumController extends Controller
{
  public function dd($data)
  {
    echo "<pre>";
    print_r($data);
    exit;
  }

  public function gen_filename($data)
  {
    $randomPrefix = rand(0, 9) . chr(rand(65, 90)) . rand(0, 9) . chr(rand(97, 122));
    $newFileName = $randomPrefix . '-' . strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/', '', $data));
    return $newFileName;
  }

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
   * Lists all InformasiHukum models.
   * @return mixed
   */
  public function actionIndex()
  {
    $searchModel = new InformasiHukumSearch();
    /*
        $searchModel = new InformasiHukumSearch(['id'=>\Yii::$app->user->identity->direktorat_id]);
        $dataProvider->query->andWhere(['id'=>[2,3,4]]);
        */
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }

  /**
   * Displays a single InformasiHukum model.
   * @param integer $id
   * @return mixed
   */
  public function actionView($id)
  {
    return $this->render('view', [
      'model' => $this->findModel($id),
    ]);
  }

  /**
   * Creates a new InformasiHukum model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   * @return mixed

    public function actionCreate()
    {
        $model = new InformasiHukum();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
   */

  public function actionCreate()
  {
    $model = new InformasiHukum();

    if ($model->load(Yii::$app->request->post())) {
      // Upload image
      $image = UploadedFile::getInstance($model, 'image');
      if (!empty($image)) {
        $model->image = $this->gen_filename($image->name);

        $path = Yii::getAlias("@common/dokumen/$model->image");
        $image->saveAs($path);
      }

      // Upload dokumen
      $dokumen = UploadedFile::getInstance($model, 'dokumen');
      if (!empty($dokumen)) {
        $model->dokumen = $this->gen_filename($dokumen->name);

        $path = Yii::getAlias("@common/dokumen/$model->dokumen");
        $dokumen->saveAs($path);
      }


      if ($model->save()) {
        Yii::$app->session->setFlash('success', 'Data InformasiHukum berhasil ditambahkan');
        return $this->redirect(['view', 'id' => $model->id]);
      } else {
        Yii::$app->session->setFlash('error', 'Data InformasiHukum Gagal ditambahkan, periksa kembali ');
        return $this->render('create', ['model' => $model]);
      }
    } else {
      return $this->render('create', [
        'model' => $model,
      ]);
    }
  }


  /**
   * Updates an existing InformasiHukum model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id
   * @return mixed
   */
  public function actionUpdate($id)
  {
    $model      = $this->findModel($id);
    $oldImage   = $model->image;
    $oldDokumen = $model->dokumen;

    if ($model->load(Yii::$app->request->post())) {
      // Update image
      $image = UploadedFile::getInstance($model, 'image');
      if (!empty($image)) {
        $model->image = $this->gen_filename($image->name);

        $path = Yii::getAlias("@common/dokumen/$model->image");
        $image->saveAs($path);

        $deleteImage = Yii::getAlias("@common/dokumen/$oldImage");
        if (is_file($deleteImage))
          unlink($deleteImage);
      } else {
        $model->image = $oldImage;
      }

      // Update dokumen
      $dokumen = UploadedFile::getInstance($model, 'dokumen');
      if (!empty($dokumen)) {
        $model->dokumen = $this->gen_filename($dokumen->name);

        $path = Yii::getAlias("@common/dokumen/$model->dokumen");
        $dokumen->saveAs($path);

        $deleteDokumen = Yii::getAlias("@common/dokumen/$oldDokumen");
        if (is_file($deleteDokumen))
          unlink($deleteDokumen);
      } else {
        $model->dokumen = $oldDokumen;
      }

      if ($model->save()) {
        Yii::$app->session->setFlash('success', 'Data InformasiHukum berhasil diubah');
        return $this->redirect(['view', 'id' => $model->id]);
      } else {
        Yii::$app->session->setFlash('error', 'Data InformasiHukum Gagal diubah, periksa kembali ');
        return $this->render('create', ['model' => $model]);
      }
    } else {
      return $this->render('update', [
        'model' => $model,
      ]);
    }
  }

  /**
   * Deletes an existing InformasiHukum model.
   * If deletion is successful, the browser will be redirected to the 'index' page.
   * @param integer $id
   * @return mixed
   */
  public function actionDelete($id)
  {
    try {
      $model = $this->findModel($id);

      // Hapus model dari database
      if ($model->delete()) {
        $deleteImage = Yii::getAlias("@common/dokumen/$model->image");
        if (is_file($deleteImage))
          unlink($deleteImage);

        $deleteDokumen = Yii::getAlias("@common/dokumen/$model->dokumen");
        if (is_file($deleteDokumen))
          unlink($deleteDokumen);

        Yii::$app->session->setFlash('danger', 'Data Informasi Hukum berhasil dihapus');
      }

      return $this->redirect(['index']);
    } catch (\yii\db\IntegrityException  $e) {
      Yii::$app->session->setFlash('error', "Data Informasi Hukum Tidak Dapat Dihapus Karena Dipakai Modul Lain");
      return $this->redirect(['index']);
    }
  }



  /**
   * Finds the InformasiHukum model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param integer $id
   * @return InformasiHukum the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($id)
  {
    if (($model = InformasiHukum::findOne($id)) !== null) {
      return $model;
    } else {
      throw new NotFoundHttpException('The requested page does not exist.');
    }
  }

  public function actionParent($id)
  {
    if ($id == '11e449f371bb47e09607313231373436') {
      $instansi = 'Kementerian';
      $rows = \backend\models\peraturan\Institutions::find()->where(['jenis' => $instansi])->all();
      echo "<option>Pilih Kementerian</option>";
    } else {
      $instansi = 'Lembaga';
      $rows = \backend\models\peraturan\Institutions::find()->where(['jenis' => $instansi])->all();
      echo "<option>Pilih Lembaga Non Kementerian</option>";
    }

    // echo "<option>Pilih Kementerian/Lembaga</option>";

    if (count($rows) > 0) {
      foreach ($rows as $row) {
        echo "<option value='$row->id'>$row->nama</option>";
      }
    } else {
      echo "<option>Nenhum municipio cadastrado</option>";
    }
  }
}
