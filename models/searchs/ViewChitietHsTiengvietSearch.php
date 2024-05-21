<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ViewChitietHsTiengviet;

/**
 * HocsinhSearch represents the model behind the search form of `app\models\hocsinh`.
 */
class ViewChitietHsTiengvietSearch extends ViewChitietHsTiengviet
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hsid'], 'integer'],
            [['tenhs', 'gioitinh', 'ngaysinh', 'diem_giua_ki1', 'diem_ki1', 'diem_giua_ki2', 'diem_ki2', 'TB', 'ghichu'], 'safe'],
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
        $query = ViewChitietHsTiengviet::find();

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

        $query->andFilterWhere(['like', 'tenhs', $this->tenhs])
            ->andFilterWhere(['like', 'gioitinh', $this->gioitinh])
            ->andFilterWhere(['like', 'diem_giua_ki1', $this->diem_giua_ki1])
            ->andFilterWhere(['like', 'diem_ki1', $this->diem_ki1])
            ->andFilterWhere(['like', 'diem_giua_ki2', $this->diem_giua_ki2])
            ->andFilterWhere(['like', 'diem_ki2', $this->diem_ki2])
            ->andFilterWhere(['like', 'TB', $this->TB])
            ->andFilterWhere(['like', 'ghichu', $this->ghichu]);


        return $dataProvider;
    }
}
