<?php

namespace App\Models;

use PDO;

/**
 * Class Db
 * @package App
 */
class Db
{
    /**
     * @var PDO
     */
    public $pdo;

    /**
     * Db constructor.
     */
    public function __construct()
    {
        $settings = $this->getPDOSettings();
        $this->pdo = new PDO($settings['dsn'], $settings['user'], $settings['pass'], null);

    }

    /**
     * @return array
     */
    protected function getPDOSettings()
    {
        $config = include ROOTPATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db.php';
        $result['dsn'] = "{$config['type']}:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        $result['user'] = $config['user'];
        $result['pass'] = $config['pass'];

        return $result;
    }

    /**
     * @param $query
     * @param array|null $params
     * @return array
     */
    public function execute(string $query, array $params = null)
    {
        if (is_null($params)) {
            $stmt = $this->pdo->query($query);

            return $stmt->fetchAll();
        }
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll();
    }
}