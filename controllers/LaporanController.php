<?php

namespace app\controllers;

use Yii;
use app\models\Laporan;
use app\models\LaporanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Unit2;
use app\models\Lokasi;
use app\models\Kondisi;
use yii\helpers\ArrayHelper;


/**
 * LaporanController implements the CRUD actions for Laporan model.
 */
class LaporanController extends Controller
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
                    'logout' => ['POST'],
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Laporan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LaporanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $unit2 = Unit2::find()->all();
        $unit2 = ArrayHelper::map($unit2,'id','unit2');

        $lokasi = Lokasi::find()->all();
        $lokasi = ArrayHelper::map($lokasi,'id','lokasi');

        $kondisi = Kondisi::find()->all();
        $kondisi = ArrayHelper::map($kondisi,'id','kondisi');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'unit2' => $unit2,
            'lokasi' => $lokasi,
            'kondisi' => $kondisi,
        ]);
    }

    /**
     * Displays a single Laporan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Laporan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Laporan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Laporan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Laporan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionCheckin()
    {       
        $user = Yii::$app->user->identity->id;
        $today = date('Y-m-d');
        $query = Laporan::find()->where(['user_id' => $user])
                                ->andWhere(['like','submit_date',$today]);
        $model = $query->one();
                                
        $count = $query->count();

        if($count > 0 ){
            return $this->render('checkin',[
                'model' => $model,
            ]);
        } else {
            return $this->redirect(['lokasi']);
        }      
        
    }

    public function actionLokasi()
    {       
        return $this->render('lokasi');
    }

    public function actionChecklokasi($lokasi)
    {       
        return $this->redirect(['kondisi','lokasi'=>$lokasi]);
    }

    public function actionKondisi()
    {       
        return $this->render('kondisi');
    }

    public function actionCheckkondisi($lokasi,$kondisi)
    {       
        return $this->redirect(['lingkungan','lokasi'=>$lokasi,'kondisi'=>$kondisi]);
    }

    public function actionLingkungan()
    {       
        $model = new Laporan();

        if ($model->load(Yii::$app->request->post())) {

            $request = Yii::$app->request;
            $model->lokasi_id = $request->get('lokasi');
            $model->kondisi_id = $request->get('kondisi');

            $model->user_id = Yii::$app->user->identity->id;
            $model->unit1_id = Yii::$app->user->identity->unit1_id;
            $model->unit2_id = Yii::$app->user->identity->unit2_id;
           
            $ha = 'Keluarga : '. $model->keluarga;
            $hi = ' // Lingkungan : '. $model->lingkungan;
            $hu = ' // Sakit : '. $model->sakit;

            if($model->sakit == null){
                $hu = '';
            }
            $model->keterangan = $ha. $hi .$hu;

            $model->submit_date = date('Y-m-d H:i:s');

            $model->save(false);

            return $this->redirect(['checkin']);
        }

        return $this->render('lingkungan', [
            'model' => $model,
        ]);
        
    }

    public function actionChecklingkungan($id)
    {       
        return $this->redirect(['checkin']);
    }

    public function actionRekap()
    {       
        $model = new Laporan();

        if ($model->load(Yii::$app->request->post())) {

            $date = $model->today;
            
        }  else {
            $date = date('Y-m-d');
            
        }

        return $this->render('rekap',[
            'model' => $model,
            'date' => $date,
        ]);   
                                  
    }


    /**
     * Finds the Laporan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Laporan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Laporan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
