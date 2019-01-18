<?php
/**
 * @file
 * @brief Реализация класса Session 
 */
namespace Auth;

use Web\DataBase;
use Exceptions\ServerException;
use ReflectionClass;

require_once $_SERVER['DOCUMENT_ROOT']."application/autoload.php";
/**
 * @brief Управление сессиями и авторизацией
 */
class Session
{
  private $user_id;
  private $user_ip;
  private $user_agent;
  private $createdAt;
  private $expiresAt;
  private $access_token;

  /**
   * @brief Создание сессии для заданного пользователя 
   * @param int $user_id Идентификатор пользователя
   */
  public function __construct($user_id)
  {
    $dataBase=@new DataBase();

    $now=\time();
    $expiresAt=$now+20*60;
    $access_token=\bin2hex(\openssl_random_pseudo_bytes(100));

    $user_ip=$_SERVER['REMOTE_ADDR'];
    $user_agent=$_SERVER['HTTP_USER_AGENT'];

    // Удаляем записи с просроченными токенами
    $query=\sprintf("DELETE FROM sessions WHERE expiresAt < FROM_UNIXTIME(%s);", $now);
    $dataBase->query($query);

    // Ищем записи, соответствующие авторизованному пользователю по user_id, user_agent, user_ip
    $query=\sprintf("SELECT * FROM sessions WHERE user_id='%s' AND user_ip='%s' AND user_agent='%s';",
      $user_id, $dataBase->real_escape_string($user_ip), $dataBase->real_escape_string($user_agent));
    $res=$dataBase->query($query);
    if ($res->num_rows > 1) throw new ServerException('Data base structure error in Session', 500);

    if ($res->num_rows==1) {
    // Если запись найдена, обновляются поля expiresAt, access_token.
      $query=\sprintf("UPDATE sessions SET expiresAt=FROM_UNIXTIME(%s), access_token='%s'
        WHERE user_id='%s' AND user_ip='%s' AND user_agent='%s';", $expiresAt, $access_token, $user_id,
        $dataBase->real_escape_string($user_ip), $dataBase->real_escape_string($user_agent));
      $dataBase->query($query);
    }
    else {
    // Если не найдена, добавляется новая запись в таблицу
      $query=\sprintf("INSERT INTO sessions SET user_id='%s', user_ip='%s', user_agent='%s',
        createdAt=FROM_UNIXTIME(%s), expiresAt=FROM_UNIXTIME(%s), access_token='%s';",
        $user_id, $dataBase->real_escape_string($user_ip),
        $dataBase->real_escape_string($user_agent), $now, $expiresAt, $access_token);
      $dataBase->query($query);
    }
    $this->query=$query;

    $this->user_id=$user_id;
    $this->user_ip=$user_ip;
    $this->user_agent=$user_agent;
    $this->createdAt=$now;
    $this->expiresAt=$expiresAt;
    $this->access_token=$access_token;

    $dataBase->close();
  }

  /**
   * @brief Получение текущей сессии.
   * Если текущей сессии нет, выдает исключение с заголовком 401
   * @return в случае успеха вернет объект, содержащий данные текущей сессии
   */
  public static function getCurrentSession(): Session
  {
    if(!isset(\getallheaders()['Authorization'])) throw new ServerException('Authorization header is required', 401);

    $reflection=new ReflectionClass('Auth\Session');
    $session=$reflection->newInstanceWithoutConstructor();

    $access_token=\getallheaders()['Authorization'];

    $dataBase=@new DataBase();

    $now=\time();
    $user_ip=$_SERVER['REMOTE_ADDR'];
    $user_agent=$_SERVER['HTTP_USER_AGENT'];

    // Ищем непросроченные записи, соответствующие авторизованному пользователю по $access_token, $user_ip и $user_agent
    $query=\sprintf("SELECT * FROM sessions WHERE access_token='%s' AND expiresAt > FROM_UNIXTIME(%s)
      AND user_ip='%s' AND user_agent='%s';", $dataBase->real_escape_string($access_token), $now,
      $dataBase->real_escape_string($user_ip), $dataBase->real_escape_string($user_agent));

    $res=$dataBase->query($query);
    if ($res->num_rows > 1) throw new ServerException('Data base structure error in Session', 500);
    if ($res->num_rows == 0) throw new ServerException('Incorrect access token', 401);

    $row=$res->fetch_assoc();
    $expiresAt=$now+20*60;

    // Если запись найдена, обновляем поле expiresAt.
    $query=\sprintf("UPDATE sessions SET expiresAt=FROM_UNIXTIME(%s) WHERE access_token='%s';",
      $expiresAt, $dataBase->real_escape_string($access_token));
    $dataBase->query($query);

    $session->user_id=$row['user_id'];
    $session->user_ip=$row['user_ip'];
    $session->user_agent=$row['user_agent'];
    $session->createdAt=$row['createdAt'];
    $session->expiresAt=$expiresAt;
    $session->access_token=$row['access_token'];

    return $session;
  }

  /**
   * @brief Простая проверка актуальности сессии по токену
   * @return в случае успеха вернет TRUE, в случае ошибки - FALSE
   */
  public static function checkCurrentSession($access_token) {
    $dataBase=@new DataBase();

    $now=\time();
    $user_ip=$_SERVER['REMOTE_ADDR'];
    $user_agent=$_SERVER['HTTP_USER_AGENT'];

    // Ищем непросроченные записи, соответствующие авторизованному пользователю по $access_token, $user_ip и $user_agent
    $query=\sprintf("SELECT * FROM sessions WHERE access_token='%s' AND expiresAt > FROM_UNIXTIME(%s)
      AND user_ip='%s' AND user_agent='%s';", $dataBase->real_escape_string($access_token), $now,
      $dataBase->real_escape_string($user_ip), $dataBase->real_escape_string($user_agent));

    $res=$dataBase->query($query);
    if ($res->num_rows == 1) return true;
    else return false;
  }

  /**
   * @brief Уничтожение сессии
   * Для текущей сессии ищется запись в базе данных, если находится, она уничтожается
   * @return Значений не возвращает. При ошибках выбрасываются исключения
   */
  public function deleteSession() {
    $dataBase=@new DataBase();

    $query=\sprintf("DELETE FROM sessions WHERE access_token='%s'", $this->access_token);
    $dataBase->query($query);
  }

  /**
   * @brief Возврат токена доступа
   */
  public function getToken()
  {
    return $this->access_token;
  }

  /**
   * @brief Возврат отпечатка момента создания токена доступа
   */
  public function getCreatedAt()
  {
    return $this->createdAt;
  }

  /**
   * @brief Возврат отпечатка момента истечения срока действия токена доступа
   */
  public function getExpiresAt()
  {
    return $this->expiresAt;
  }

  /**
   * @brief Возврат идентификатора пользователя сессии
   */
  public function getUserId()
  {
    return $this->user_id;
  }

  /**
   * @brief Возврат IP пользователя сессии
   */
  public function getUserIp()
  {
    return $this->user_ip;
  }

  /**
   * @brief Возврат параметров браузера пользователя сессии
   */
  public function getUserAgent()
  {
    return $this->user_agent;
  }
}

