<?php

namespace app\controllers;

use app\models\TinyUrlForm;
use app\repositories\TinyUrlRepositoryInterface;
use app\services\TinyUrlServiceInterface;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions(): array
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @param TinyUrlServiceInterface $tinyUrlService
     * @return string
     */
    public function actionIndex(TinyUrlServiceInterface $tinyUrlService): string
    {
        $model = new TinyUrlForm();

        if (
            Yii::$app->request->isPost
            && $model->load(Yii::$app->request->post())
            && $model->validate()
        ) {
            $tinyUrl = $tinyUrlService->create(tinyUrlForm: $model);
            $url = 'http://localhost:8087/' . $tinyUrl->hash;

            return $this->render(view: 'short-url', params: ['url' => $url]);
        }

        return $this->render(view: 'index', params: ['model' => $model]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionTiny(string $hash, TinyUrlRepositoryInterface $tinyUrlRepository): Response
    {
        $model = $tinyUrlRepository->findByHash(hash: $hash);

        if ($model === null) {
            throw new NotFoundHttpException(message: 'Hash not found or expired');
        }

        return $this->redirect(url: $model->original_url);
    }
}
