<?php
/**
 * Class for a dice session
 *
 * Encapsulates the saving and restoring of dice
 */
class CDiceGame
{
  const STATE = 'gamestate';
  private $state;
  private $dice;
  private $cleardice = FALSE;
  private $cleargame = FALSE;
  private $message = "";

  public function __construct() {
    $this->state = new CSessionVar($this::STATE,
                                   array(
                                         'round' => 0,
                                         'score' => 0,
                                         ));
    $this->dice = new CDiceSession();
    $this->handleVars();
  }

  /**
   * Decides which method to run depending on player choice
   */
  private function handleVars() {
    $vars = &$_GET;

    if(!isset($vars['game_action']))
      return;

    switch($vars['game_action']) {
    case 'roll':
      $this->roll();
      break;
    case 'save':
      $this->save();
      break;
    case 'clear':
      $this->clear();
      break;
    }
  }

  /**
   * Run if player choses to roll a new dice. Handles loss of points.
   */
  private function roll() {
    $this->dice->addDice(new CDice());

    if ($this->dice->lastDice()->getValue() == 1) {
      $this->cleardice = TRUE;
      $this->state->get()['round'] += 1;
      $this->message = "Synd! Du fick en etta.";
      return;
    }

  }

  /**
   * Run if player choses to save. Handles win-conditions
   */
  private function save() {
    $this->state->get()['score'] += $this->dice->sum();
    $this->state->get()['round'] += 1;

    if ($this->state->get()['score'] >= 100) {
      $this->message = "Grattis! Du vann!";
      $this->cleardice = TRUE;
      $this->cleargame = TRUE;
    }

    $this->dice->clear();
  }

  private function clear() {
    $this->dice->clear();
    $this->state->clear();
  }

  /**
   * Does post-printing modifications
   */
  public function nextRound() {
    if ($this->cleardice === TRUE) {
      $this->dice->clear();
    }
    if ($this->cleargame === TRUE) {
      $this->state->clear();
    }
  }

  /**
   * An eventual message from the game.
   */
  public function getMessage() {
    $ret = "";
    if ($this->message !== "") {
      $ret = <<<EOF
        <p class="dice-message">{$this->message}</p>
EOF;
    }
    return $ret;
  }

  /**
   * Pictures of all dice that are counted in the current round.
   */
  public function getDice() {
    $ret = "";
    foreach($this->dice->get() as $die) {
      $ret .= $die->getImage() ."\n ";
    }
    $ret .= "<br>";

    if ($this->dice->sum() > 0) {
      $ret .= "<span class='dice-sum'>Summa: {$this->dice->sum()}</span>";
    }

    return $ret;
  }

  /**
   * Players current score.
   */
  public function getScore() {
    return <<<EOF
      Poäng: {$this->state->get()['score']}<br>
      Runda: {$this->state->get()['round']}
EOF;
  }

  /**
   * Links for actions possible to take.
   */
  public function getButtons() {
    $ret = "";
    $curURL = current_url();

    $ret .= <<<EOF
      <a href="{$curURL}?game_action=roll">Kasta</a>
      <a href="{$curURL}?game_action=save">Spara</a>
      <a href="{$curURL}?game_action=clear">Starta om</a>
EOF;

    return $ret;
  }
}
