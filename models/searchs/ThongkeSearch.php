<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Thongke;

/**
 * HocsinhSearch represents the model behind the search form of `app\models\hocsinh`.
 */
class ThongkeSearch extends Thongke
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['xepLoai', 'soluong', 'tile'], 'safe'],
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
        $query = Thongke::find();

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
        //     'gioitinh' => $this->gioitinh,
        //     'ngaysinh' => $this->ngaysinh,
        //     'malop' => $this->malop,
        // ]);

        $query->andFilterWhere(['like', 'xepLoai', $this->xepLoai])
            ->andFilterWhere(['like', 'soluong', $this->soluong])
            ->andFilterWhere(['like', 'tile', $this->tile]);

        return $dataProvider;
    }
}
