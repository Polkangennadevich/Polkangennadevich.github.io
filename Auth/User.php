<?php
/**
 * @file
 * @brief Реализация класса User
 */
namespace Auth;

use Web\DataBase;
use Exceptions\ServerException;

require_once $_SERVER['DOCUMENT_ROOT']."application/autoload.php";

/**
 * @brief Управление пользователями
 */
class User
{
  //private $user_id;
  //private $company_id;
  //private $isadmin;
  //private $login;
  //private $passwdhash;
  //private $user_name;
  //private $createdAt;

  //public function __construct($login, $password)

  /**
   * @brief Проверка авторизации пользователя
   * @param string $login Логин пользователя
   * @param string $password Пароль пользователя
   * @return В случае успеха вернет не равный 0 идентификатор пользователя, в случае ошибки выброосит исключение ServerException
   */
  public static function authorize($login, $password)
  {
    $dataBase=@new DataBase();

    $query=\sprintf("SELECT * FROM users WHERE login='%s';", $dataBase->real_escape_string($login));
    $res=$dataBase->query($query);
    if (!$res->num_rows) throw new ServerException('Incorrect login or password', 404);
    if ($res->num_rows > 1) throw new ServerException('Data base structure error in User', 500);

    $row=$res->fetch_assoc();

    if(!\password_verify($password, $row['passwdhash'])) throw new ServerException('Incorrect login or password', 404);

    $dataBase->close();
    return $row['user_id'];
  }

  /**
   * @brief Проверяет по идентификатору является ли пользователь администратором
   * @param int $user_id Идентификатор пользователя
   * @return Возвращает true, если пользователь является администратором или false в противном случае
   */
  public static function isAdmin($user_id)
  {
    $dataBase=@new DataBase();

    $query=\sprintf("SELECT * FROM users WHERE user_id=%s;", \intval($user_id));
    $res=$dataBase->query($query);
    if (!$res->num_rows) return false;
    if ($res->num_rows > 1) throw new ServerException('Data base structure error in User', 500);

    $row=$res->fetch_assoc();

    return \boolval($row['isadmin']);
  }
}
