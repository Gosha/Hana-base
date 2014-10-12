<?php
/**
 * Class for a dice session
 *
 * Encapsulates the saving and restoring of dice
 */
class CDiceSession extends CSessionVar
{
  const SESS_VAR = 'dice';

  public function __construct() {
    parent::__construct($this::SESS_VAR, array());
  }

  public function addDice(CDice $dice) {
    // Possible because CSessionVar->get() returns a reference
    array_push($this->data, $dice);
  }

  public function lastDice() {
    return end($this->data);
  }

  public function sum() {
    $sum = 0;
    foreach($this->data as $dice) {
      $sum += $dice->getValue();
    }
    return $sum;
  }
}
