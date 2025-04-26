<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property int $idpersona
 * @property string $nombre
 * @property string $apellido
 * @property string $fecha_nacimiento
 * @property string $genero
 * @property int $estado_idestado
 *
 * @property Contacto[] $contactos
 * @property Direccion[] $direccions
 * @property Documento[] $documentos
 * @property Estado $estadoIdestado
 */
class Persona extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'fecha_nacimiento', 'genero', 'estado_idestado'], 'required'],
            [['fecha_nacimiento'], 'safe'],
            [['estado_idestado'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
            [['apellido'], 'string', 'max' => 45],
            [['genero'], 'string', 'max' => 10],
            [['estado_idestado'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::class, 'targetAttribute' => ['estado_idestado' => 'idestado']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpersona' => Yii::t('app', 'Idpersona'),
            'nombre' => Yii::t('app', 'Nombres'),
            'apellido' => Yii::t('app', 'Apellidos'),
            'fecha_nacimiento' => Yii::t('app', 'Fecha de Nacimiento'),
            'genero' => Yii::t('app', 'Genero'),
            'estado_idestado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * Gets query for [[Contactos]].
     *
     * @return \yii\db\ActiveQuery|ContactoQuery
     */
    public function getContactos()
    {
        return $this->hasMany(Contacto::class, ['persona_idpersona' => 'idpersona']);
    }

    /**
     * Gets query for [[Direccions]].
     *
     * @return \yii\db\ActiveQuery|DireccionQuery
     */
    public function getDireccions()
    {
        return $this->hasMany(Direccion::class, ['persona_idpersona' => 'idpersona']);
    }

    /**
     * Gets query for [[Documentos]].
     *
     * @return \yii\db\ActiveQuery|DocumentoQuery
     */
    public function getDocumentos()
    {
        return $this->hasMany(Documento::class, ['persona_idpersona' => 'idpersona']);
    }

    /**
     * Gets query for [[EstadoIdestado]].
     *
     * @return \yii\db\ActiveQuery|EstadoQuery
     */
    public function getEstadoIdestado()
    {
        return $this->hasOne(Estado::class, ['idestado' => 'estado_idestado']);
    }

    /**
     * {@inheritdoc}
     * @return PersonaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PersonaQuery(get_called_class());
    }

}
