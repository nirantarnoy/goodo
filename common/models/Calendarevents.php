<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "calendarevents".
 *
 * @property integer $recid
 * @property string $tittle
 * @property string $start
 */
class Calendarevents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendarevents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start'], 'safe'],
            [['tittle'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'tittle' => 'Tittle',
            'start' => 'Start',
        ];
    }
}
