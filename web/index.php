<?php

// comment out the following two lines when deployed to production
use app\repositories\TinyUrlRepository;
use app\repositories\TinyUrlRepositoryInterface;
use app\services\HashGeneratorService;
use app\services\HashGeneratorServiceInterface;
use app\services\TinyUrlService;
use app\services\TinyUrlServiceInterface;

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

Yii::$container->set(class: TinyUrlRepositoryInterface::class, definition: TinyUrlRepository::class);
Yii::$container->set(class: TinyUrlServiceInterface::class, definition: TinyUrlService::class);
Yii::$container->set(class: HashGeneratorServiceInterface::class, definition: HashGeneratorService::class);

(new yii\web\Application($config))->run();
