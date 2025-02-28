<?php

namespace App\Models;

use App\Model;

class User extends Model
{
      protected $tableName = 'users';

      public function checkExistsEmailForCreate($email)
      {
            // khởi tạo queryBuilder
            $queryBuilder = $this->connection->createQueryBuilder();

            // tạo query kiểm tra sự tồn tại của email
            $queryBuilder->select('COUNT(*)')
                  ->from($this->tableName)
                  ->where('email = :email')
                  ->setParameter('email', $email);

            // thực hiện query lấy kết quả
            $result = $queryBuilder->fetchOne();



            // lớn hơn 0 là tồn tại
            return $result > 0;
      }

      public function checkExistsEmailForUpdate($id, $email)
      {
            $queryBuilder = $this->connection->createQueryBuilder();

            $queryBuilder->select('COUNT(*)')
                  ->from($this->tableName)
                  ->where('email = :email')
                  ->andWhere('id != :id')
                  ->setParameter('email', $email)
                  ->setParameter('id', $id);


            $result = $queryBuilder->fetchOne();

            return  $result > 0;
      }

      public function getUserByEmail($email)
      {
            $queryBuilder = $this->connection->createQueryBuilder();


            $queryBuilder->select('*')
                  ->from($this->tableName)
                  ->where('email = :email')
                  ->setParameter('email', $email);

            $result = $queryBuilder->fetchAssociative();

            return $result;
      }
}