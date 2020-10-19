<?php

namespace frontend\models;

use common\models\Comment;
use yii\base\Model;

class CommentForm extends Model
{
    /**
     * @var null|string action form
     */
    public $action = null;
    /**
     * @var int|null
     */
    public $pid = null;
    /**
     * @var string
     */
    public $title;
    /**
     * @var string
     */
    public $content;

    public function __construct($action = null)
    {
        $this->action = $action;

        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['pid', 'post_id'], 'integer'],
            [['title', 'content'], 'required'],
            [['title', 'content'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'title' => 'Nosaukums',
            'content' => 'Komentārs'
        ];
    }

    public function save(Comment $comment, array $data): bool
    {
        $isLoad = $comment->load([
            'pid' => $data['pid'],
            'title' => $data['title'],
            'content' => $data['content']
        ], '');

        return ($isLoad && $comment->save());
    }
}
