<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "JenisInformasiHukum".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $singkatan
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class JenisInformasiHukum extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'jenis_informasi_hukum';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['created_by', 'updated_by'], 'integer'],
      [['created_at', 'updated_at'], 'safe'],
      [['name', 'singkatan'], 'string', 'max' => 255],
    ];
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getInformasiHukums()
  {
    return $this->hasMany(InformasiHukum::className(), ['jenis' => 'id']);
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'name' => 'Name',
      'singkatan' => 'Singkatan',
      'created_by' => 'Created By',
      'updated_by' => 'Updated By',
      'created_at' => 'Created At',
      'updated_at' => 'Updated At',
    ];
  }

  public function behaviors()
  {
    return [
      'timestamp' => [
        'class' => 'yii\behaviors\TimestampBehavior',
        'attributes' => [
          ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
          ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
        ],
        'value' => new Expression('NOW()'),
      ],
      'blameable' => [
        'class' => BlameableBehavior::className(),
        'createdByAttribute' => 'created_by',
        'updatedByAttribute' => 'updated_by',
      ],
    ];
  }

  public function getTanggal($tanggal)  // fungsi atau method untuk mengubah hari, tanggal ke format indonesia
  {
    $BulanIndo = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $HariIndo = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    $sepparator = '-';
    $parts = explode($sepparator, $tanggal);

    //$hari = $HariIndo[date("w", mktime(0, 0, 0, $parts[1], $parts[2], $parts[0]))]; //mendapatkan hari indonesia
    $tgl   = substr($tanggal, 8, 2); // memisahkan format tanggal menggunakan substring
    $bulan = substr($tanggal, 5, 2); // memisahkan format bulan menggunakan substring
    $tahun = substr($tanggal, 0, 4); // memisahkan format tahun menggunakan substring

    //$result = $hari .", " .$tgl . " " . $BulanIndo[(int)$bulan] . " ". $tahun;
    $result = $tgl . " " . $BulanIndo[(int)$bulan] . " " . $tahun;
    return ($result);
  }
}
