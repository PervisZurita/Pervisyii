<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contacto".
 *
 * @property int $idcontacto
 * @property int $persona_idpersona
 * @property string $tipo
 *
 * @property Persona $personaIdpersona
 */
class Contacto extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['persona_idpersona', 'tipo'], 'required'],
            [['persona_idpersona'], 'integer'],
            [['tipo'], 'string', 'max' => 100],
            [['persona_idpersona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::class, 'targetAttribute' => ['persona_idpersona' => 'idpersona']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcontacto' => Yii::t('app', 'Idcontacto'),
            'persona_idpersona' => Yii::t('app', 'Personas'),
            'tipo' => Yii::t('app', 'Tipos'),
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
     * @return ContactoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContactoQuery(get_called_class());
    }

}
