<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $ownership
 * @property string $tel_first
 * @property string $tel_sec
 * @property string $tel_next
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $city
 * @property integer $level
 *
 * @property Level $level0
 * @property Ownership $ownership0
 * @property Users $user
 */
class Profile extends \yii\db\ActiveRecord
{
    const INCOGNITO = 1;
    const TEL_DEFAULT = '+380000000000';
    const LEVEL_BONUS = 1;

    const OWNERSHIP = [
        '1' => 'incognito',
        '3' => 'entity',
        '4' => 'individual',
    ];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'ownership', 'tel_first'], 'required'],
            [['user_id', 'ownership', 'level'], 'integer'],
            [['tel_first', 'tel_sec', 'tel_next'], 'string', 'max' => 20],
            [['name', 'surname', 'patronymic', 'city'], 'string', 'max' => 50],
            [['level'], 'exist', 'skipOnError' => true, 'targetClass' => Level::className(), 'targetAttribute' => ['level' => 'id']],
            [['ownership'], 'exist', 'skipOnError' => true, 'targetClass' => Ownership::className(), 'targetAttribute' => ['ownership' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
            /**
             * 'on' => 'save_p
             */
            [['user_id'], 'required','on'=>'save_p'],
            [['user_id', 'ownership', 'tel_first', 'tel_sec', 'tel_next', 'name', 'surname', 'patronymic', 'city', 'level'], 'safe', 'on' => 'save_p'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'ownership' => Yii::t('app', 'Ownership'),
            'tel_first' => Yii::t('app', 'Tel First'),
            'tel_sec' => Yii::t('app', 'Tel Sec'),
            'tel_next' => Yii::t('app', 'Tel Next'),
            'name' => Yii::t('app', 'Name'),
            'surname' => Yii::t('app', 'Surname'),
            'patronymic' => Yii::t('app', 'Patronymic'),
            'city' => Yii::t('app', 'City'),
            'level' => Yii::t('app', 'Level'),
        ];
    }
    public function scenarios()
    {
        return [
            'save_p' => ['user_id', 'ownership', 'tel_first', 'tel_sec', 'tel_next', 'name', 'surname', 'patronymic', 'city', 'level'],

        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel0()
    {
        return $this->hasOne(Level::className(), ['id' => 'level']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwnership0()
    {
        return $this->hasOne(Ownership::className(), ['id' => 'ownership']);
    }
    public function getOwnership()
    {
        $arr = [];
        foreach (self::OWNERSHIP as $k=>$v) {
            $arr[$k] = Yii::t('cabinet','ownership')[$v];
        }
        return $arr;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    public static function getName($id)
    {
        $user = self::findOne(['user_id' => $id]);
        return $user->surname.' '.$user->name;
    }

    public function defaultSave($user)
    {
        $this->user_id = $user;
        $this->ownership = self::INCOGNITO;
        $this->tel_first =  self::TEL_DEFAULT;
        $this->tel_sec = '';
        $this->tel_next = '';
        $this->name = 'Name';
        $this->surname = '';
        $this->patronymic = '';
        $this->city = 'City';
        $this->level = self::LEVEL_BONUS;

        return $this->save();
    }
}
