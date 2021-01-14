<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class Feedback extends ActiveRecord
{
    public static function tableName(){
        return 'feedback';   
    }

    public function rules()
    {
        return [
            //Требует заполнения
            [['name', 'email', 'subject', 'message'], 'required'],
            //
            [['name', 'email', 'subject', 'message'], 'string'],
            //Проверка мыла
            [['email'], 'email'],
            //
            [['date_create'], 'safe'],
            //
            //[['date_create'], 'default'],
        ];
    }

    public function attributeLabels() //"переименновывает" при отображении
    {
        return [
            //Названия в мал. регистре и через "_" вместо " "
            'id' => 'User ID',
            'name' => 'Your name',
            'email' => 'Your email address',
            'subject' => 'Subject your message',
            'message' => 'Message',
            'date_create' => 'Date Create',
        ];
    }

    public function afterSave($insert, $changedAttributes){
        parent::afterSave($insert, $changedAttributes);
        if ($insert){
            try{
                Yii::$app->mailer->compose()
                    ->setFrom('Batted73@yandex.ru')
                    ->setTo($this->email)
                    ->setSubject($this->subject)
                    ->setTextBody('Здравствуйте!\n От Вашего имени пришло сообщение со следующим содержанием:\n'.$this->message)
                    ->setHtmlBody('<b>'.$this->message.'</b>')
                    ->send();
            }
            catch(\Exception $e){

            }
            
        }
    }
}