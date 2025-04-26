<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Direccion;

/**
 * DireccionSearch represents the model behind the search form of `app\models\Direccion`.
 */
class DireccionSearch extends Direccion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iddireccion', 'persona_idpersona'], 'integer'],
            [['calle', 'ciudad', 'provincia'], 'safe'],
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Direccion::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'iddireccion' => $this->iddireccion,
            'persona_idpersona' => $this->persona_idpersona,
        ]);

        $query->andFilterWhere(['like', 'calle', $this->calle])
            ->andFilterWhere(['like', 'ciudad', $this->ciudad])
            ->andFilterWhere(['like', 'provincia', $this->provincia]);

        return $dataProvider;
    }
}
