<?php

namespace LogError;

use LogError\Db as Db;

/**
 * LogError
 * Log php errors
 *
 * @author François LASSERRE <choiz@me.com>
 * @version 1.1.0
 * $license http://www.gnu.org/licenses/gpl.html GNU Public License
 */
class LogError
{
    public function __construct($datas, $session)
    {
        $this->db = Db::getInstance();

        $sql = "INSERT INTO `LogError`
            SET `id`=NULL,
                `type`=:type,
                `file`=:file,
                `msg`=:msg,
                `line`=:line,
                `column`=:column,
                `trace`=:trace,
                `url`=:url,
                `user_agent`=:user_agent,
                `session`=:session,
                `date`=NOW();
        ";

        $query = $this->db->prepare($sql);

        $params = [];
        $params[':type'] = $datas['type'];
        $params[':file'] = $datas['file'];
        $params[':msg'] = $datas['msg'];
        $params[':line'] = $datas['line'];
        $params[':column'] = $datas['column'];
        $params[':trace'] = $datas['trace'];
        $params[':url'] = $datas['url'];
        $params[':user_agent'] = $datas['user_agent'];
        $params[':session'] = serialize($session);

        $query->execute($params);

        return true;
    }
}
