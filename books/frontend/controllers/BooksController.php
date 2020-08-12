<?php
namespace frontend\controllers;

use yii\rest\ActiveController;
use frontend\models\Book;

class BooksController extends ActiveController {

    public $modelClass = 'frontend\models\Book';
    
    public function actionList() {
        $booksAndAuthors = Book::find()->with("authors")->asArray()->all();

        return $booksAndAuthors;
    }

    public function actionFind($id) {
        $book = Book::find()->with("authors")->where(['id' => $id])->asArray()->one();

        return $book;
    }
}