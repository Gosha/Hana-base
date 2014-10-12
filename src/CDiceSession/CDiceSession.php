<?php
/**
 * Class for a dice session
 *
 * Encapsulates the saving and restoring of dice
 */
class CDiceSession
{
  const SESS_VAR = 'dice';

  private $dice;

  public function __construct() {
    $this->dice = new CSessionVar($this::SESS_VAR, array());
  }

  public function getDice() {
    return $this->dice->get();
  }

  public function addDice(CDice $dice) {
    // Possible because CSessionVar->get() returns a reference
    array_push($this->dice->get(), $dice);
  }

  public function sum() {
    $sum = 0;
    foreach($this->dice->get() as $dice) {
      $sum += $dice->getValue();
    }
    return $sum;
  }

  public function clearDice() {
    $this->dice->clear();
  }
}
