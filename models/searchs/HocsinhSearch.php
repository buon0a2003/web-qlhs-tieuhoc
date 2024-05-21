<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\hocsinh;

/**
 * HocsinhSearch represents the model behind the search form of `app\models\hocsinh`.
 */
class HocsinhSearch extends hocsinh
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hsid'], 'integer'],
            [['tenhs', 'malop', 'gioitinh', 'ngaysinh', 'sdtbome', 'diachi', 'ghichu'], 'safe'],
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
        $query = hocsinh::find();
        $query->leftJoin('Lop', 'lop.lopid = hocsinh.malop');

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
            'hsid' => $this->hsid,
            'gioitinh' => $this->gioitinh,
            'ngaysinh' => $this->ngaysinh,
            // 'malop' => $this->malop,
        ]);

        $query->andFilterWhere(['like', 'tenhs', $this->tenhs])
            ->andFilterWhere(['like', 'lop.ten_lop', $this->malop])
            ->andFilterWhere(['like', 'sdtbome', $this->sdtbome])
            ->andFilterWhere(['like', 'diachi', $this->diachi])
            ->andFilterWhere(['like', 'ghichu', $this->ghichu]);

        return $dataProvider;
    }
}
