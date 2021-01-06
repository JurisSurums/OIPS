<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

/**
 * Post model.
 *
 * @property string $id
 * @property string $title
 * @property string $anons
 * @property string $content
 * @property string $category_id
 * @property string $author_id
 * @property string $publish_status
 * @property string $publish_date
 *
 * @property User $author
 * @property Category $category
 * @property Comment[] $comments
 */
class Post extends ActiveRecord
{
    //publikācijas statuss
    public const STATUS_PUBLISH = 'publish';
    public const STATUS_DRAFT = 'draft';

    /**
     * Tag list
     * @var array
     */
    //tagu masīvs, kuru saturēs posts$tags, pieejams tikai Postu klasē
    protected $tags = [];

    /**
     * @inheritdoc
     */
    //tabula, no kuras tiks iegūti un izgūti dati
    public static function tableName(): string
    {
        return '{{%post}}';
    }

    /**
     * @inheritdoc
     */
    // validācijas noteikumi tiek veidoti pēc rules() funkcijas
    public function rules(): array
    {
        return [
            [['title'], 'required'],
            [['anons'], 'required'],
            [['content'], 'required'],
            [['publish_date'], 'required'],
            [['category_id', 'author_id'], 'integer'],
            [['anons', 'content', 'publish_status'], 'string'],
            [['publish_date', 'tags'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    //sākotnējie attribūtu piešķiršana ar loģiskākiem nosaukumiem
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'title' => Yii::t('backend', 'Title'),
            'anons' => Yii::t('backend', 'Announce'),
            'content' => Yii::t('backend', 'Content'),
            'category' => Yii::t('backend', 'Category'),
            'tags' => Yii::t('backend', 'Tags'),
            'category_id' => Yii::t('backend', 'Category ID'),
            'author' => Yii::t('backend', 'Author'),
            'author_id' => Yii::t('backend', 'Author ID'),
            'publish_status' => Yii::t('backend', 'Publish status'),
            'publish_date' => Yii::t('backend', 'Publish date'),
        ];
    }
    // pēc šīs funkcijas tiek atrasts izvēlētā posta autors
    public function getAuthor(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'author_id']);
    }
    //pēc šīš funkcijas tiek atrasts izvēlētā posta kategorija
    public function getCategory(): ActiveQuery
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
    //pēc šīs funkcijas tiek atrasti visi komentāri, kas atrodas zem šī posta
    public function getComments(): ActiveQuery
    {
        return $this->hasMany(Comment::class, ['post_id' => 'id']);
    }
    //pēc šīs funkcijas tiek atrasti visi komentāri, kuriem publikācijas statusa īpašība ir "STATUS_PUBLISH"
    public function getPublishedComments(): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => $this->getComments()
                ->where(['publish_status' => Comment::STATUS_PUBLISH]) // atrod komentārus, kuri published
        ]);
    }
    //tagu masīvam pievienots jauns ieraksts
    public function setTags(array $tagsId): void
    {
        $this->tags = $tagsId;
    }

    /**
     * Return tag ids
     */
    //atgriež visus tagus no tagPost tabulas
    public function getTags(): array
    {
        return ArrayHelper::getColumn(
            $this->getTagPost()->all(), 'tag_id'
        );
    }

    /**
     * Return tags for post
     *
     * @return ActiveQuery
     */
    //atgriež visus posta tagus
    public function getTagPost(): ActiveQuery
    {
        return $this->hasMany(
            TagPost::class, ['post_id' => 'id']
        );
    }
    //atgriež publicētos postus un atgriež tos pēc tā publikācijas datuma
    public static function findPublished(): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => Post::find()
                ->where(['publish_status' => self::STATUS_PUBLISH])
                ->orderBy(['publish_date' => SORT_DESC]) // for de main page
        ]);
    }

    /**
     * @throws NotFoundHttpException
     */
    // automātiskā moduļa funkcijas, kura atrod pēc ID postu
    public static function findById(int $id, bool $ignorePublishStatus = false): Post
    {
        if (($model = Post::findOne($id)) !== null) {
            if ($model->isPublished() || $ignorePublishStatus) {
                return $model;
            }
        }
        throw new NotFoundHttpException('The requested post does not exist.');
    }
    //Tiek meklēti visi posti pēc kategorijasID
    public static function findByCategoryId(int $id)
    {
        $model = Post::find()->where(['category_id'=>$id])->all();
        return $model;
    }
    /**
     * @inheritdoc
     */
    // no modeļa tiek saglabāti dati TagPost starp tabulā
    // https://forum.yiiframework.com/t/solved-save-in-aftersave/63802
    public function afterSave($insert, $changedAttributes)
    {
        TagPost::deleteAll(['post_id' => $this->id]);
        // no starptabulas tiek dzēsti dati
        if (is_array($this->tags) && !empty($this->tags)) {
            $values = [];
            foreach ($this->tags as $id)
            {
                $values[] = [$this->id, $id]; // izveido vērtību pāri starp tabulai ar postu un visiem tā tagiem
            }
            self::getDb()->createCommand()->batchInsert(TagPost::tableName(), ['post_id', 'tag_id'], $values)->execute(); // vērtības tiek ievietotas
        }
        parent::afterSave($insert, $changedAttributes);
    }
//pārbauda vai postam publikācijas statuss ir "STATUS_PUBLISHED"
    protected function isPublished(): bool
    {
        return $this->publish_status === self::STATUS_PUBLISH;
    }
}
