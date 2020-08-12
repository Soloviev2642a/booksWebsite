<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

use yii\helpers\ArrayHelper;
use frontend\models\Book;
use frontend\models\Author;
use frontend\models\BookAuthor;

class HomeController extends Controller {
    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex($details = 0) {
        if ($details != 0) {

            $bookModel = new Book();

            // Если отправлена форма
            if ($bookModel->load(Yii::$app->request->post())) {
                $bookToUpdate = Book::find()->where(['id' => $details])->one();
                $bookToUpdate->name = $bookModel->name;
                $bookToUpdate->price = $bookModel->price;
                $bookToUpdate->datePublished = date("Y-m-d H:i:s");

                // Убрать всех старых авторов у книги
                $booksAuthorsToDelete = BookAuthor::find()->where(['bookId' => $bookToUpdate->id])->all();
                foreach ($booksAuthorsToDelete as $bookAuthorToDelete) {
                    $bookAuthorToDelete->delete();
                }

                // И добавить новых
                foreach ($bookModel->authors as $author) {
                    $bookAuthor = new BookAuthor();
                    $bookAuthor->bookId = $bookToUpdate->id;
                    $bookAuthor->authorId = $author;
                    $bookAuthor->save();                    
                }

                $bookToUpdate->save(false);
            }

            $authors = Author::find()->asArray()->all();
            $book = Book::find()->where(['id' => $details])->with('authors')->asArray()->one();

            if (empty($book)) {
                return $this->render('error404');
            }

            return $this->render('details', ['authors' => $authors, 'book' => $book, 'bookModel' => $bookModel]);
        } else {
            $booksAndAuthors = Book::find()->with('authors')->asArray()->all();
            return $this->render('index', ['books' => $booksAndAuthors]);
        }
    }

}