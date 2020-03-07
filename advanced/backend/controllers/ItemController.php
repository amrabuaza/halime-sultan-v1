<?php

namespace backend\controllers;

use backend\models\ItemColor;
use backend\models\ItemPhoto;
use backend\models\ItemShippingPrice;
use backend\models\ItemSize;
use Yii;
use backend\models\Item;
use backend\models\ItemSearch;
use backend\models\Model;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ItemController implements the CRUD actions for Item model.
 */
class ItemController extends Controller
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
                        'actions' => ['create', 'delete', 'index', 'view', 'update',
                            'add-size', 'update-size',
                            'add-color', 'update-color',
                            'add-shipping', 'update-shipping',
                            'add-photo', 'update-photo',
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    /**
     * Lists all Item models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Item model.
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
     * Creates a new Item model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Item;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Item model.
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


    public function actionAddSize($id)
    {

        $itemId = $this->findModel($id)->id;
        $itemSizes = [new ItemSize];
        $itemSizes = Model::createMultiple(ItemSize::classname());

        if (Model::loadMultiple($itemSizes, Yii::$app->request->post()) && Model::validateMultiple($itemSizes)) {

            $transaction = \Yii::$app->db->beginTransaction();

            try {
                foreach ($itemSizes as $index => $modelSize) {
                    $modelSize->item_id = $itemId;

                    if (!($flag = $modelSize->save(false))) {
                        $transaction->rollBack();
                        break;
                    }

                }

                if ($flag) {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $itemId]);
                }
            } catch (Exception $exception) {
                $transaction->rollBack();
            }
        }

        return $this->render('_item-size', [
            'itemId' => $itemId,
            'actionName' => "Add",
            'itemSizes' => (empty($itemSizes)) ? [new ItemSize] : $itemSizes,
        ]);
    }

    public function actionUpdateSize($id)
    {
        $item = $this->findModel($id);
        $itemId = $item->id;
        $itemSizes = $item->itemSizes;

        if (Model::loadMultiple($itemSizes, Yii::$app->request->post()) && Model::validateMultiple($itemSizes)) {

            $transaction = \Yii::$app->db->beginTransaction();

            $oldSizeIDs = ArrayHelper::map($itemSizes, 'id', 'id');
            $itemSizes = Model::createMultiple(ItemSize::classname(), $itemSizes);
            Model::loadMultiple($itemSizes, Yii::$app->request->post());
            $deletedSizeIDs = array_diff($oldSizeIDs, array_filter(ArrayHelper::map($itemSizes, 'id', 'id')));

            try {
                if (!empty($deletedSizeIDs)) {
                    ItemSize::deleteAll(['id' => $deletedSizeIDs]);
                }
                foreach ($itemSizes as $index => $modelSize) {
                    $modelSize->item_id = $itemId;

                    if (!($flag = $modelSize->save(false))) {
                        $transaction->rollBack();
                        break;
                    }

                }

                if ($flag) {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $itemId]);
                }
            } catch (Exception $exception) {
                $transaction->rollBack();
            }
        }

        return $this->render('_item-size', [
            'itemId' => $itemId,
            'actionName' => "Update",
            'itemSizes' => $itemSizes,
        ]);
    }

    public function actionAddColor($id)
    {

        $itemId = $this->findModel($id)->id;
        $itemColors = [new ItemColor];
        $itemColors = Model::createMultiple(ItemColor::classname());

        if (Model::loadMultiple($itemColors, Yii::$app->request->post()) && Model::validateMultiple($itemColors)) {

            $transaction = \Yii::$app->db->beginTransaction();

            try {
                foreach ($itemColors as $index => $modelColor) {
                    $modelColor->item_id = $itemId;

                    if (!($flag = $modelColor->save(false))) {
                        $transaction->rollBack();
                        break;
                    }

                }

                if ($flag) {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $itemId]);
                }
            } catch (Exception $exception) {
                $transaction->rollBack();
            }
        }

        return $this->render('_item-color', [
            'itemId' => $itemId,
            'actionName' => "Add",
            'itemColors' => (empty($itemColors)) ? [new ItemColor] : $itemColors,
        ]);
    }

    public function actionUpdateColor($id)
    {
        $item = $this->findModel($id);
        $itemId = $item->id;
        $itemColors = $item->itemColors;

        if (Model::loadMultiple($itemColors, Yii::$app->request->post()) && Model::validateMultiple($itemColors)) {

            $transaction = \Yii::$app->db->beginTransaction();


            $oldColorIDs = ArrayHelper::map($itemColors, 'id', 'id');
            $itemColors = Model::createMultiple(ItemColor::classname(), $itemColors);
            Model::loadMultiple($itemColors, Yii::$app->request->post());
            $deletedColorIDs = array_diff($oldColorIDs, array_filter(ArrayHelper::map($itemColors, 'id', 'id')));

            try {
                if (!empty($deletedColorIDs)) {
                    ItemColor::deleteAll(['id' => $deletedColorIDs]);
                }
                foreach ($itemColors as $index => $modelColor) {
                    $modelColor->item_id = $itemId;

                    if (!($flag = $modelColor->save(false))) {
                        $transaction->rollBack();
                        break;
                    }

                }

                if ($flag) {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $itemId]);
                }
            } catch (Exception $exception) {
                $transaction->rollBack();
            }
        }

        return $this->render('_item-color', [
            'itemId' => $itemId,
            'actionName' => "Update",
            'itemColors' => $itemColors,
        ]);
    }

    public function actionAddPhoto($id)
    {

        $itemId = $this->findModel($id)->id;
        $itemPhotos = [new ItemPhoto];
        $itemPhotos = Model::createMultiple(ItemPhoto::classname());

        if (Model::loadMultiple($itemPhotos, Yii::$app->request->post()) && Model::validateMultiple($itemPhotos)) {

            $transaction = \Yii::$app->db->beginTransaction();

            try {

                // to create directory in uploads for this month and this year ..
                $currentDate = date('Y-m');
                $this->createDirectoryOfCurrentMonthIfNotExists($currentDate);


                foreach ($itemPhotos as $index => $modelPhoto) {
                    $modelPhoto->item_id = $itemId;

                    $image = UploadedFile::getInstanceByName("ItemPhoto[" . $index . "][upload_image]");
                    if ($image != null) {
                        $modelPhoto->name = $currentDate . "/" . $this->guid() . '.' . $image->extension;
                    }


                    if (!($flag = $modelPhoto->save(false))) {
                        $transaction->rollBack();
                        break;
                    }

                    if ($image != null) {
                        $image->saveAs('uploads/' . $modelPhoto->name);
                    }

                }

                if ($flag) {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $itemId]);
                }
            } catch (Exception $exception) {
                $transaction->rollBack();
            }
        }

        return $this->render('_item-photo', [
            'itemId' => $itemId,
            'actionName' => "Add",
            'itemPhotos' => (empty($itemPhotos)) ? [new ItemPhoto] : $itemPhotos,
        ]);
    }

    public function actionUpdatePhoto($id)
    {
        $item = $this->findModel($id);
        $itemId = $item->id;
        $itemPhotos = $item->itemPhotos;

        if (Model::loadMultiple($itemPhotos, Yii::$app->request->post()) && Model::validateMultiple($itemPhotos)) {

            $transaction = \Yii::$app->db->beginTransaction();

            $oldPhotoIDs = ArrayHelper::map($itemPhotos, 'id', 'id');
            Model::loadMultiple($itemPhotos, Yii::$app->request->post());

            $itemPhotos = Model::createMultiple(ItemPhoto::classname(), $itemPhotos);

            $deletedPhotoIDs = array_diff($oldPhotoIDs, array_filter(ArrayHelper::map($itemPhotos, 'id', 'id')));

            try {
                if (!empty($deletedPhotoIDs)) {
                    ItemPhoto::deleteAll(['id' => $deletedPhotoIDs]);
                }

                // to create directory in uploads for this month and this year ..
                $currentDate = date('Y-m');
                $this->createDirectoryOfCurrentMonthIfNotExists($currentDate);

                foreach ($itemPhotos as $index => $modelPhoto) {

                    $modelPhoto->item_id = $itemId;

                    $image = UploadedFile::getInstanceByName("ItemPhoto[" . $index . "][upload_image]");
                    if ($image != null) {

                        $modelPhoto->name = $currentDate . "/" . $this->guid() . '.' . $image->extension;
                    }


                    if (!($flag = $modelPhoto->save(false))) {
                        $transaction->rollBack();
                        break;
                    }

                    if ($image != null) {
                        $image->saveAs('uploads/' . $modelPhoto->name);
                    }

                }

                if ($flag) {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $itemId]);
                }
            } catch (Exception $exception) {
                $transaction->rollBack();
            }
        }

        return $this->render('_item-photo', [
            'itemId' => $itemId,
            'actionName' => "Update",
            'itemPhotos' => $itemPhotos,
        ]);
    }

    public function actionAddShipping($id)
    {
        $model = new ItemShippingPrice;
        $model->item_weight = Item::findOne($id)->weight;
        $model->item_id = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->renderAjax('_item-shipping', [
            'model' => $model,
        ]);
    }

    public function actionUpdateShipping($id)
    {
        $model = ItemShippingPrice::findOne(["item_id" => $id]);
        $model->item_weight = Item::findOne($id)->weight;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->renderAjax('_item-shipping', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Item model.
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

    /**
     * Finds the Item model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Item the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Item::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function createDirectoryOfCurrentMonthIfNotExists($currentDate)
    {
        if (!file_exists("uploads/" . $currentDate)) {
            mkdir("uploads/" . $currentDate);
        }
    }

    function guid()
    {
        $data = openssl_random_pseudo_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}
