<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

/**
 * Comment model
 *
 * @property int $id
 * @property int $pid
 * @property string $title
 * @property string $content
 * @property string $publish_status
 * @property int $post_id
 * @property int $author_id
 *
 * @property Post $post
 * @property User $author
 */
class Comment extends ActiveRecord
{
    public const STATUS_MODERATE = 'moderate';
    public const STATUS_PUBLISH = 'publish';

    /**
     * @inheritdoc
     */
    public static function tableName(): string
    {
        return '{{%comment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [['pid', 'post_id', 'author_id'], 'integer'],
            [['title', 'content'], 'required'],
            [['publish_status'], 'string'],
            [['title', 'content'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'pid' => Yii::t('backend', 'Pid'),
            'title' => Yii::t('backend', 'Title'),
            'content' => Yii::t('backend', 'Content'),
            'publish_status' => Yii::t('backend', 'Publish status'),
            'post_id' => Yii::t('backend', 'Post ID'),
            'author_id' => Yii::t('backend', 'Author ID'),
        ];
    }

    public function getPost(): ActiveQuery
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }

    public function getAuthor(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'author_id']);
    }

    public static function findById(int $id, bool $ignorePubStat = false): Comment // ignorepubstat, ja nav svarīgs statuss
    {
        if (($model = Comment::findOne($id)) !== null) {
            if ($model->isPublished() || $ignorePubStat){
                return $model;
            }
        }
        throw new NotFoundHttpException('Komentārs neeksistē.');
    }

    protected function isPublished(): bool
    {
        return $this->publish_status === self::STATUS_PUBLISH;
    }
}
