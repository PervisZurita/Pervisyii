<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Documento;

/**
 * DocumentoSearch represents the model behind the search form of `app\models\Documento`.
 */
class DocumentoSearch extends Documento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iddocumento', 'persona_idpersona'], 'integer'],
            [['tipo_documento', 'numero', 'fecha_emision'], 'safe'],
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
        $query = Documento::find();

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
            'iddocumento' => $this->iddocumento,
            'persona_idpersona' => $this->persona_idpersona,
            'fecha_emision' => $this->fecha_emision,
        ]);

        $query->andFilterWhere(['like', 'tipo_documento', $this->tipo_documento])
            ->andFilterWhere(['like', 'numero', $this->numero]);

        return $dataProvider;
    }
}
