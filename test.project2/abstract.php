<?php
abstract class Model {

    public static function findOne(int $id)
    {
        $tableName = strtolower(static::class);
        $sql = 'SELECT * FROM' . $tableName . 'WHERE id=:id';
        var_dump($sql);
    }

    public function delete(int $id)
    {
        $tableName = strtolower(static::class);
        $sql = 'DELETE FROM' . $tableName . 'WHERE id=:id';
        var_dump($sql);
    }

    public function create()
    {
        $tableName = strtolower(static::class);
        $data = get_object_vars($this);
        $property = array_keys($data);
        $property2 = array_map(function ($item){
            return ':' . $item;
        }, $property);
        $sql = 'INSERT INTO' . $tableName . '('.implode(',', $property).') VALUES ('.implode(',', $property2).')';
        var_dump($sql);
    }

    public function update(int $id)
    {
        $tableName = strtolower(static::class);
        $sql = 'UPDATE' . $tableName . 'SET name = :name, email = :email WHERE id = :id';
        var_dump($sql);
    }

    public function save(int $id)
    {
        $user = static::findOne($id);
        if ($user) {
            $this->update($id);
        } else {
            $this->create();
        }
    }

}
class User extends Model {
    public $id;
    public $name;
    public $email;
}

$user = User::findOne(2);

$user1 = new User();
$user1->delete(2);
$user1->create();
$user1->update(2);

$user1->name = 'John';
$user1->email = 'some@gmail.com';
$user1->save(3);

var_dump($user, $user1);