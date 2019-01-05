<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 04.01.2019
 * Time: 22:06
 */

namespace app\components;

use yii\base\Component;
use yii\db\Query;


class DAOComponent extends Component

{
     public $db_component_name;

     public function getUsersList(){
        $db=$this->getConnection();
        return $db->createCommand('select * from users')->queryAll();
     }

     public function getActivityUser($user_id){
        $db=$this->getConnection();
        $sql='select * from activity where user_id=:user';
        return $db->createCommand($sql,[':user'=>$user_id])->queryAll();
    }

    public function getFirstActivityUser($user_id){
        $db=$this->getConnection();
        $sql='select * from activity where user_id=:user';
        return $db->createCommand($sql,[':user'=>$user_id])->queryOne();
    }
//
    public function getCountActivityUser($user_id){
        $db=$this->getConnection();
        $sql='select count(id) as cnt from activity where user_id=:user';
        return $db->createCommand($sql,[':user'=>$user_id])->queryScalar();
    }

    public function getQueryActivityUser(){ //проверяет и возвращает сам запрос, а не выборку данных

        return $this->getConnection()->createCommand('select * from activity')->query();
    }

    public function updateUsers(){ //пример изменения данных в таблице
                                      //execute() - возвращает количество изменненых строк в табл
        return $this->getConnection()->createCommand('update users set username=new_user where id=2')->execute();
    }

    public function transactTest(){
         $transaction = $this->getConnection()->beginTransaction();
         try{
             //выполняем какие-либо действия с бд
             $this->getConnection()->createCommand('update users set username=new_user where id=2')->execute();

             $transaction-> commit();

         }catch (\Exception $e){
            $transaction->rollBack();
            echo 'Транзакция отменена';
        }
     }

     public function getActivityOneDay(){ //пример использования построителя запросов
         $query=new Query();
         $query->select(['activity.id','title','date_start','username','users.email'])
             ->from('activity')
             ->join('inner join','users','activity.user_id=users.id')
             ->andWhere('date_start>=:date',[':date'=>date('Y-m-d')])
             ->limit(5)
             ->orderBy(['title'=>SORT_ASC]);

         //return $query->createCommand($this->getConnection())->rawSql; //получение текста запроса
         return $query->all();
     }

    public function getConnection(){
         return \Yii::$app->{$this->db_component_name};
     }
}