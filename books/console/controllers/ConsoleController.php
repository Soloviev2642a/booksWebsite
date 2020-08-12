<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use frontend\models\Book;
use frontend\models\BookAuthor;

class ConsoleController extends Controller {
    
    const YEAR_IN_SECONDS = 31536000;

    public function actionTest() {
        $books = Book::find()->all();

        foreach ($books as $book) {
            $timePassed = time() - strtotime($book->datePublished);

            if ($timePassed > self::YEAR_IN_SECONDS) {
                echo "Year passed, deleting book...\n";

                // Убрать всех авторов у книги
                $booksAuthorsToDelete = BookAuthor::find()->where(['bookId' => $book->id])->all();
                foreach ($booksAuthorsToDelete as $bookAuthorToDelete) {
                    $bookAuthorToDelete->delete();
                }

                $book->delete();
            }
        }
    }

}