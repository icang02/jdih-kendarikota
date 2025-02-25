<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\MemberForm;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\search\RancanganSearch;
use frontend\models\ContactForm;
use frontend\models\Berita;
use frontend\models\Pengunjung;
use frontend\models\Narasi;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'profile'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'profile'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        // $perencanaan =  Rancangan::find()->where(['tahapan_rancangan'=>'Perencanaan']);              
        // $penyusunan  =  Rancangan::find()->where(['tahapan_rancangan'=>'Penyusunan']);
        // // $pembahasan  = Rancangan::find()->where(['tahapan_rancangan'=>'Pembahasan']);
        // $perencanaan = new ActiveDataProvider([
        //     'query' => Rancangan::find()->where(['tahapan_rancangan'=>'Perencanaan']),
        //     'sort' => ['defaultOrder' => ['tanggal_akhir_publish' => SORT_DESC]],
        //     'pagination' => [
        //         'pageSize' => 3,
        //     ],
        // ]);  

        // $penyusunan = new ActiveDataProvider([
        //     'query' => Rancangan::find()->where(['tahapan_rancangan'=>'Penyusunan'])->limit(2),
        //     'sort' => ['defaultOrder' => ['tanggal_akhir_publish' => SORT_DESC]],
        //       //  'limit' => 2,
        //     'pagination' => [
        //         'pageSize' => 3,
        //     ],
        // ]);      

        // $pembahasan = new ActiveDataProvider([
        //     'query' => Rancangan::find()->where(['tahapan_rancangan'=>'Pembahasan']),
        //     'sort' => ['defaultOrder' => ['tanggal_akhir_publish' => SORT_DESC]],
        //     'pagination' => [
        //         'pageSize' => 3,
        //     ],             
        // ]);   
        $narasi = Narasi::findOne(1);
        $pengunjung = Pengunjung::findOne(1);
        if ($pengunjung->hari != date('Y-m-d'))
            $pengunjung->jumlah_perhari = 1;
        else
            $pengunjung->jumlah_perhari = $pengunjung->jumlah_perhari + 1;

        if ($pengunjung->bulan != date('Y-m'))
            $pengunjung->jumlah_bulan = 1;
        else
            $pengunjung->jumlah_bulan = $pengunjung->jumlah_bulan + 1;

        $pengunjung->hari = date('Y-m-d');
        $pengunjung->bulan = date('Y-m');


        $pengunjung->jumlah_keseluruhan = $pengunjung->jumlah_keseluruhan + 1;

        $pengunjung->save();

        // $pengunjung = \frontend\models\Pengunjung::find()->where(['id' => 1])
        //     ->all();



        $peraturan = \frontend\models\Dokumen::find()->where(['tipe_dokumen' => 1])
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(4)
            //->offset(1)
            ->all();

        $pengumuman = \frontend\models\Pengumuman::find()
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(3)
            ->all();
        $video = \frontend\models\Video::find()
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(3)
            ->all();

        $monografi = \frontend\models\Dokumen::find()->where(['tipe_dokumen' => 2])
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(1)
            //->offset(1)
            ->all();
        for ($i = date('Y') - 4; $i <= date('Y'); $i++) {
            $count_peraturan[$i] = \frontend\models\Dokumen::find()->where(['tipe_dokumen' => 1, 'tahun_terbit' => $i])->count();
            $count_monografi[$i] = \frontend\models\Dokumen::find()->where(['tipe_dokumen' => 2, 'tahun_terbit' => $i])->count();
            $count_putusan[$i] = \frontend\models\Dokumen::find()->where(['tipe_dokumen' => 4, 'tahun_terbit' => $i])->count();
        }
        $count = [$count_peraturan, $count_monografi, $count_putusan];
        // echo '<pre>';
        // print_r($count);
        // echo '</pre>';
        // die;

        $berita = \frontend\models\Berita::find()->where(['status' => 1])
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(3)
            //->offset(1)
            ->all();

        $searchModel = new RancanganSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        // echo "<pre>";
        // print_r($peraturan[0]->pemrakarsa);
        // exit;
        return $this->render('index', [
            'model' => $searchModel,
            'berita' => $berita,
            'peraturan' => $peraturan,
            'monografi' => $monografi,
            'count' => $count,
            'narasi' => $narasi,
            'video' => $video,
            'pengumuman' => $pengumuman,
            // 'perencanaan' => $perencanaan,
            // 'penyusunan'  => $penyusunan,
            // 'pembahasan'  => $pembahasan,            
            // 'dataProvider' => $dataProvider,
        ]);
    }


    public function actionSekilasSejarah()
    {
        return $this->render('sekilas-sejarah');
    }

    public function actionDasarHukum()
    {
        return $this->render('dasar-hukum');
    }

    public function actionVisi()
    {
        return $this->render('visi');
    }

    public function actionMisi()
    {
        return $this->render('misi');
    }
    public function actionSto()
    {
        return $this->render('struktur');
    }
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new MemberForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->session->setFlash('success', 'Selamat Datang Di Website Partisipasi Publik Rancangan Peraturan Perundang-undangan');
            //return $this->goBack();
            return $this->render('/profile/index', ['model' => $model]);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        Yii::$app->session->setFlash('warning', 'anda telah logout dari web aplikasi kami');
        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionKontaks()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('kontak', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    // public function actionProfile()
    // {
    //     return $this->render('profile/index');
    // }

    public function actionKontak()
    {
        return $this->render('kontak');
    }
    /**
     * Signs user up.
     *
     * @return mixed
     */

    /**
     * Hapus signup frontend
     */

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
