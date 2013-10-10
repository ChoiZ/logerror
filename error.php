<?php
/*
 * Error.php v1.0.0 - Log php errors
 * http://www.logerror.net
 *
 * Last modified: 2013-10-10
 * Author: François LASSERRE <choiz@me.com>
 * License: GNU GPL http://www.gnu.org/licenses/gpl.html
 */

class Error {

  public function __construct() {

    $sql = "INSERT INTO `error`
      (`id`, `type`, `file`, `msg`, `line`, `url`,
       `useragent`,
       `session`, `date`)
      VALUES (NULL, :type, :file, :msg,
          :line, :url, :ua, :sess,
          NOW());";
    $query = $db->prepare($sql);
    $params = array(
        ":type" => $_POST["type"],
        ":file" => $_POST["file"],
        ":msg" => $_POST["msg"],
        ":line" => $_POST["line"],
        ":url" => $_POST["url"],
        ":ua" => $_POST["ua"],
        ":sess" => serialize($_SESSION),
        );
    $query->execute($params);

  }

}