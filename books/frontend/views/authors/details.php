<?php
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap4;

/* @var $this yii\web\View */

$this->title = 'Author details page';
?>

<div class="container">

    <h1 class="text-center py-4"><?= $author["name"] ?></h1>

    <div class="row">
        <div class="col-12">
            <?php echo Breadcrumbs::widget([
                'homeLink' => [
                    'label' => 'Authors',
                    'url' => '/authors'
                ],
                'links' => [
                    [
                        'label' => $author["name"],
                        'template' => "&nbsp/&nbsp{link} "
                    ]
                ],
            ]); ?>
        </div>
    </div>

    <div class="bookDetails row py-4">
        <div class="col-3">
            <div class="bookDetailsImage">
                <img src="assets/images/author.png">
            </div>
        </div>

        <div class="col-9">
            <div class="bookDetailsForm">
            
                <?php $form = ActiveForm::begin();?>

                <?= $form->field($authorModel, 'name')->textInput(['value' => $author['name']]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            
            </div>
        </div>
    </div>
    
</div>