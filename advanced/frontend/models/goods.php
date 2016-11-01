<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $aid
 * @property string $title
 * @property string $content
 * @property integer $addtime
 * @property string $author
 * @property integer $c_number
 */
class Article extends \yii\db\ActiveRecord
{
	 public function rules()
    {
        return [
        	['goods_name','string']
        ];
            
        
    }

}