<?php

/* @var $this yii\web\View */

$this->title = 'Books page';
?>

<div class="container">

    <h1 class="text-center">Books</h1>
    
    <?php 
        foreach ($books as $book) {
            echo "
                <div class='bookCard row'>
                    <div class='col-1'>
                        <div class='bookCardImage'>
                            <img src='assets/images/book.png'>
                        </div>
                    </div>

                    <div class='col-11'>
                        <span>Name: " . $book["name"] . "</span>
                        <span>Authors: "; 
                            foreach ($book["authors"] as $author) {
                                echo $author["name"] . "; ";
                            }
            echo        "</span>
                        <span>Price: " . $book["price"] . " ₽</span>
                        <span>Date published: " . $book["datePublished"] . "</span>
                        <a href='?details=" . $book['id'] . "'>Details</a>
                    </div>
                </div>
            ";
        }
    ?>
    
</div>