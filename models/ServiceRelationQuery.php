<?php

namespace elephantsGroup\serviceRelation\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use elephantsGroup\serviceRelation\models\ServiceRelation;

/**
 * ServiceRelationQuery represents the model behind the search form about `frontend\models\ServiceRelation`.
 */
class ServiceRelationQuery extends ServiceRelation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'service1_id', 'item1_id', 'service2_id', 'item2_id', 'relation_type', 'sort_order', 'status'], 'integer'],
            [['update_time', 'creation_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = ServiceRelation::find();

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
            'service1_id' => $this->service1_id,
            'item1_id' => $this->item1_id,
            'service2_id' => $this->service2_id,
            'item2_id' => $this->item2_id,
            'relation_type' => $this->relation_type,
            'sort_order' => $this->sort_order,
            'status' => $this->status,
            'update_time' => $this->update_time,
            'creation_time' => $this->creation_time,
        ]);

        return $dataProvider;
    }
}
