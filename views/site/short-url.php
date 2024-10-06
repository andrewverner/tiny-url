<?php

/**
 * @var yii\web\View $this
 * @var string $url
 */

use yii\helpers\Html;

$this->title = 'TinyURL';
?>
<div class="site-short-url">
    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success">
                    Your URL has been shortened successfully:
                    <strong><?= Html::a(text: $url, url: $url, options: ['target' => '_blank']); ?></strong>
                </div>
            </div>
        </div>

    </div>
</div>
