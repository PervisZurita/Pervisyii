<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado".
 *
 * @property int $idestado
 * @property string $estado
 *
 * @property Persona[] $personas
 */
class Estado extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estado'], 'required'],
            [['estado'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idestado' => Yii::t('app', 'Idestado'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * Gets query for [[Personas]].
     *
     * @return \yii\db\ActiveQuery|PersonaQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::class, ['estado_idestado' => 'idestado']);
    }

    /**
     * {@inheritdoc}
     * @return EstadoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EstadoQuery(get_called_class());
    }

}
