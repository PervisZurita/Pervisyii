<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "documento".
 *
 * @property int $iddocumento
 * @property int $persona_idpersona
 * @property string $tipo_documento
 * @property string $numero
 * @property string $fecha_emision
 *
 * @property Persona $personaIdpersona
 */
class Documento extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'documento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['persona_idpersona', 'tipo_documento', 'numero', 'fecha_emision'], 'required'],
            [['persona_idpersona'], 'integer'],
            [['fecha_emision'], 'safe'],
            [['tipo_documento'], 'string', 'max' => 100],
            [['numero'], 'string', 'max' => 45],
            [['persona_idpersona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::class, 'targetAttribute' => ['persona_idpersona' => 'idpersona']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddocumento' => Yii::t('app', 'Iddocumento'),
            'persona_idpersona' => Yii::t('app', 'Persona'),
            'tipo_documento' => Yii::t('app', 'Tipo de Documento'),
            'numero' => Yii::t('app', 'Numero del Documento'),
            'fecha_emision' => Yii::t('app', 'Fecha de Emision'),
        ];
    }

    /**
     * Gets query for [[PersonaIdpersona]].
     *
     * @return \yii\db\ActiveQuery|PersonaQuery
     */
    public function getPersonaIdpersona()
    {
        return $this->hasOne(Persona::class, ['idpersona' => 'persona_idpersona']);
    }

    /**
     * {@inheritdoc}
     * @return DocumentoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DocumentoQuery(get_called_class());
    }

}
