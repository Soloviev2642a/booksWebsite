<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

class BookAuthor extends ActiveRecord {

    public static function tableName() {
        return '{{books_authors_table}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['bookId', 'authorId'], 'safe']
        ];
    }
}
