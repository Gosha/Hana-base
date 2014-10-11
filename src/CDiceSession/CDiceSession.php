<?php
/**
 * Class for a dice session
 *
 * Encapsulates the saving and restoring of dice
 */
class CDiceSession
{
  const SESS_VAR = 'dice';

  private $dice = array();

  public function __construct() {
    if (isset($_SESSION[self::SESS_VAR])) {
      $this->dice = $_SESSION[self::SESS_VAR];
    }
  }

  public function __destruct() {
    if (isset($this->dice)) {
      $_SESSION[self::SESS_VAR] = $this->dice;
    }
  }

  public function getDice() {
    return $this->dice;
  }

  public function addDice(CDice $dice) {
    $this->dice[] = $dice;
  }

  public function clearDice() {
    $this->dice = array();
  }
}
