<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "direccion".
 *
 * @property int $iddireccion
 * @property int $persona_idpersona
 * @property string $calle
 * @property string $ciudad
 * @property string $provincia
 *
 * @property Persona $personaIdpersona
 */
class Direccion extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'direccion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['persona_idpersona', 'calle', 'ciudad', 'provincia'], 'required'],
            [['persona_idpersona'], 'integer'],
            [['calle'], 'string', 'max' => 100],
            [['ciudad', 'provincia'], 'string', 'max' => 45],
            [['persona_idpersona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::class, 'targetAttribute' => ['persona_idpersona' => 'idpersona']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddireccion' => Yii::t('app', 'Iddireccion'),
            'persona_idpersona' => Yii::t('app', 'Persona'),
            'calle' => Yii::t('app', 'Calle'),
            'ciudad' => Yii::t('app', 'Ciudad'),
            'provincia' => Yii::t('app', 'Provincia'),
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
     * @return DireccionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DireccionQuery(get_called_class());
    }

}
