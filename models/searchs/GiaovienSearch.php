<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Giaovien;

/**
 * GiaovienSearch represents the model behind the search form of `app\models\Giaovien`.
 */
class GiaovienSearch extends Giaovien
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gvid'], 'integer'],
            [['hotengv', 'ngay_sinh', 'diachi', 'sdt', 'mamon'], 'safe'],
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
        $query = Giaovien::find();
        $query->innerJoin('monhoc', 'giaovien.mamon = monhoc.idmonhoc');

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
            'gvid' => $this->gvid,
            'ngay_sinh' => $this->ngay_sinh,
            // 'mamon' => $this->mamon,
        ]);

        $query->andFilterWhere(['like', 'hotengv', $this->hotengv])
            ->andFilterWhere(['like', 'diachi', $this->diachi])
            ->andFilterWhere(['like', 'sdt', $this->sdt])
            ->andFilterWhere(['like', 'monhoc.tenmon', $this->mamon]);

        return $dataProvider;
    }
}
