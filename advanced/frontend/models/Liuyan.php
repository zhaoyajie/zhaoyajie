<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property integer $aid
 * @property string $title
 * @property string $content
 * @property integer $addtime
 * @property string $author
 * @property integer $c_number
 */
class Liuyan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }
}