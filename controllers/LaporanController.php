<?php

namespace app\controllers;

use Yii;
use app\models\Laporan;
use app\models\LaporanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','checkin','kondisi','lokasi','lingkungan'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
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

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
                                
        $count = $query->count();

        if($count > 0 ){
            return $this->render('checkin');
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
            $model->user_id = Yii::$app->user->identity->id;
            $model->host_id = Yii::$app->user->identity->host_loker_id;

            $ha = $model->keluarga;
            $hi = $model->lingkungan;
            $hu = $model->sakit;
            $request = Yii::$app->request;
            $model->lokasi_id = $request->get('lokasi');
            $model->kondisi_id = $request->get('kondisi');

            $model->keterangan = 'Keluarga : '.$ha. ' // Lingkungan : '. $hi. ' // Sakit : '.$hu;

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
