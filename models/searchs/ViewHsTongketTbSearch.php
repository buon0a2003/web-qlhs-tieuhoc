<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ViewHsTongketTb;

/**
 * HocsinhSearch represents the model behind the search form of `app\models\hocsinh`.
 */
class ViewHsTongketTbSearch extends ViewHsTongketTb
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hsid'], 'integer'],
            [['tenhs', 'tienganhTB', 'tiengvietTB', 'toanTB', 'Tongket', 'xepLoai'], 'safe'],
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
        $query = ViewHsTongketTbSearch::find();

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
        // $query->andFilterWhere([
        //     'hsid' => $this->hsid,
        //     'ngaysinh' => $this->ngaysinh,
        //     'malop' => $this->malop,
        // ]);

        $query->andFilterWhere(['like', 'hsid', $this->hsid])
            ->andFilterWhere(['like', 'tenhs', $this->tenhs])
            ->andFilterWhere(['like', 'tienganhTB', $this->tienganhTB])
            ->andFilterWhere(['like', 'tiengvietTB', $this->tiengvietTB])
            ->andFilterWhere(['like', 'toanTB', $this->toanTB])
            ->andFilterWhere(['like', 'Tongket', $this->Tongket])
            ->andFilterWhere(['like', 'xepLoai', $this->xepLoai]);

        return $dataProvider;
    }
}
