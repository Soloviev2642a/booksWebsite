<?php
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\bootstrap4;

/* @var $this yii\web\View */

$this->title = 'Book details page';
?>

<div class="container">

    <h1 class="text-center py-4"><?= $book["name"] ?></h1>

    <div class="row">
        <div class="col-12">
            <?php echo Breadcrumbs::widget([
                'homeLink' => [
                    'label' => 'Books',
                    'url' => '/'
                ],
                'links' => [
                    [
                        'label' => $book["name"],
                        'template' => "&nbsp/&nbsp{link} "
                    ]
                ],
            ]); ?>
        </div>
    </div>

    <div class="bookDetails row py-4">
        <div class="col-3">
            <div class="bookDetailsImage">
                <img src="assets/images/book.png">
            </div>
        </div>

        <div class="col-9">
            <div class="bookDetailsForm">
                <?php $form = ActiveForm::begin();?>

                <?= $form->field($bookModel, 'name')->textInput(['value' => $book['name']]) ?>

                <?= $form->field($bookModel, 'authors[]')->widget(Select2::classname(), [
                    'bsVersion' => '4.x',
                    'data' => ArrayHelper::map($authors, 'id', 'name'),
                    'options' => [
                        'value' => ArrayHelper::getColumn($book['authors'], 'id'),
                        'placeholder' => 'Select author ...',
                    ],
                    'pluginOptions' => [
                        'multiple' => true,
                    ],
                ]) ?>

                <?= $form->field($bookModel, 'price')->textInput(['type' => 'number', 'value' => $book['price']]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    
</div>