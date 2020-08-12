<?php

/* @var $this yii\web\View */

$this->title = 'Authors page';
?>
<div class="container">

    <h1 class="text-center">Authors</h1>

    <?php 
        foreach ($authors as $author) {
            echo "
                <div class='bookCard row'>
                    <div class='col-1'>
                        <div class='bookCardImage'>
                            <img src='assets/images/author.png'>
                        </div>
                    </div>

                    <div class='col-11'>
                        <span>Name: " . $author["name"] . "</span>
                        <span>Book count: " . count($author["books"]) . "</span>
                        <a href='?details=" . $author['id'] . "'>Details</a>
                    </div>
                </div>
            ";
        }
    ?>
</div>