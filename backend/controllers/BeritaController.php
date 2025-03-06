<?php

namespace backend\controllers;

use Yii;
use backend\models\Berita;
use backend\models\BeritaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BeritaController implements the CRUD actions for Berita model.
 */
class BeritaController extends Controller
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
   * Lists all Berita models.
   * @return mixed
   */
  public function actionIndex()
  {
    $searchModel = new BeritaSearch();
    /*
        $searchModel = new BeritaSearch(['id'=>\Yii::$app->user->identity->direktorat_id]);
        $dataProvider->query->andWhere(['id'=>[2,3,4]]);
        */
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }

  /**
   * Displays a single Berita model.
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
   * Creates a new Berita model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   * @return mixed

    public function actionCreate()
    {
        $model = new Berita();

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
    $model = new Berita();

    if ($model->load(Yii::$app->request->post())) {
      $image = UploadedFile::getInstance($model, 'image');

      if (!empty($image)) {
        $model->image = $this->gen_filename($image->name);

        $path = Yii::getAlias("@common/dokumen/$model->image");
        $image->saveAs($path);
      }

      if ($model->save()) {
        Yii::$app->session->setFlash('success', 'Data Berita berhasil ditambahkan');
        return $this->redirect(['view', 'id' => $model->id]);
      } else {
        Yii::$app->session->setFlash('error', 'Data Berita Gagal ditambahkan, periksa kembali ');
        return $this->render('create', ['model' => $model]);
      }
    } else {
      return $this->render('create', [
        'model' => $model,
      ]);
    }
  }


  /**
   * Updates an existing Berita model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id
   * @return mixed
   */
  public function actionUpdate($id)
  {
    $model = $this->findModel($id);
    $oldImage = $model->image;

    if ($model->load(Yii::$app->request->post())) {
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

      if ($model->save()) {
        Yii::$app->session->setFlash('success', 'Data Berita berhasil diubah');
        return $this->redirect(['view', 'id' => $model->id]);
      } else {
        Yii::$app->session->setFlash('error', 'Data Berita Gagal diubah, periksa kembali ');
        return $this->render('create', ['model' => $model]);
      }
    } else {
      return $this->render('update', [
        'model' => $model,
      ]);
    }
  }

  /**
   * Deletes an existing Berita model.
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

        Yii::$app->session->setFlash('danger', 'Data Berita berhasil dihapus');
      }

      return $this->redirect(['index']);
    } catch (\yii\db\IntegrityException $e) {
      Yii::$app->session->setFlash('error', "Data Berita Tidak Dapat Dihapus Karena Dipakai Modul Lain");
      return $this->redirect(['index']);
    }
  }


  /**
   * Finds the Berita model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param integer $id
   * @return Berita the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($id)
  {
    if (($model = Berita::findOne($id)) !== null) {
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
