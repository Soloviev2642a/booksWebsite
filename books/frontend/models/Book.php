<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

class Book extends ActiveRecord {

    public $authors = [];

    public static function tableName() {
        return '{{books_table}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name', 'price', 'authors'], 'required'],
            [['name', 'price', 'datePublished', 'authors'], 'safe']
        ];
    }

    public function getAuthors() {
        return $this->hasMany(Author::className(), ['id' => 'authorId'])->viaTable('books_authors_table', ['bookId' => 'id']);
    }
}
