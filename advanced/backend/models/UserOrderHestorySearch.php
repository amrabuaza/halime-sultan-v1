<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UserOrderHestory;

/**
 * UserOrderHestorySearch represents the model behind the search form of `backend\models\UserOrderHestory`.
 */
class UserOrderHestorySearch extends UserOrderHestory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'user_address_id', 'promo_code_id', 'transaction_id', 'transfer_id', 'user_order_id'], 'integer'],
            [['status', 'created_at', 'updated_at'], 'safe'],
            [['total'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = UserOrderHestory::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'total' => $this->total,
            'user_id' => $this->user_id,
            'user_address_id' => $this->user_address_id,
            'promo_code_id' => $this->promo_code_id,
            'transaction_id' => $this->transaction_id,
            'transfer_id' => $this->transfer_id,
            'user_order_id' => $this->user_order_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
