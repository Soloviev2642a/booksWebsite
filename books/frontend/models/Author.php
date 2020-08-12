<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

class Author extends ActiveRecord {
    public static function tableName() {
        return '{{authors_table}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['name'], 'safe'],
        ];
    }

    public function getBooks() {
        return $this->hasMany(Book::className(), ['id' => 'bookId'])->viaTable('books_authors_table', ['authorId' => 'id']);
    }
}
