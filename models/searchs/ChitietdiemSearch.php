<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Chitietdiem;

/**
 * ChitietdiemSearch represents the model behind the search form of `app\models\Chitietdiem`.
 */
class ChitietdiemSearch extends Chitietdiem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_chitietdiem', 'mamon', 'mahocsinh', 'diem_giua_ki1', 'diem_ki1', 'diem_giua_ki2', 'diem_ki2'], 'integer'],
            [['ghichu'], 'safe'],
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
        $query = Chitietdiem::find();

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
            'id_chitietdiem' => $this->id_chitietdiem,
            'mamon' => $this->mamon,
            'mahocsinh' => $this->mahocsinh,
            'diem_giua_ki1' => $this->diem_giua_ki1,
            'diem_ki1' => $this->diem_ki1,
            'diem_giua_ki2' => $this->diem_giua_ki2,
            'diem_ki2' => $this->diem_ki2,
        ]);

        $query->andFilterWhere(['like', 'ghichu', $this->ghichu]);

        return $dataProvider;
    }
}
