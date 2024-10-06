<?php

/**
 * @var yii\web\View $this
 * @var TinyUrlForm $model
 */

use app\models\TinyUrlForm;
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

$this->title = 'TinyURL';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field(model: $model, attribute: 'url')->textInput(); ?>

                <?= Html::submitButton(content: 'Process', options: ['class' => 'btn btn-success']); ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>

    </div>
</div>
