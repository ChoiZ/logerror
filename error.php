<?php
/**
 * Error
 * Log php errors
 *
 * @author François LASSERRE <choiz@me.com>
 * @version 1.0.0
 * $license http://www.gnu.org/licenses/gpl.html GNU Public License
 */
class Error {

  /* public __construct() {{{ */
  /**
   * __construct
   *
   * @access public
   * @return void
   */
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
  /* }}} */

}