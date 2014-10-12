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
  private $method;
  private $cleardice = FALSE;
  private $cleargame = FALSE;
  private $message = "";

  public function __construct($method = "GET") {
    $this->method = $method;
    $this->state = new CSessionVar($this::STATE,
                                   array(
                                         'round' => 0,
                                         'score' => 0,
                                         ));
    $this->dice = new CDiceSession();
    $this->handleVars();
  }

  private function handleVars() {
    if ($this->method == "GET") {
      $vars = &$_GET;
    } else {
      $vars = &$_POST;
    }

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

  private function roll() {
    $this->dice->addDice(new CDice());

    if ($this->dice->lastDice()->getValue() == 1) {
      $this->cleardice = TRUE;
      $this->state->get()['round'] += 1;
      $this->message = "Synd! Du fick en etta.";
      return;
    }

  }

  private function save() {
    $this->state->get()['score'] += $this->dice->sum();
    $this->state->get()['round'] += 1;

    if ($this->state->get()['score'] >= 100) {
      $this->message = "Grattis! Du vann!";
      $this->cleardice = TRUE;
      $this->cleargame = TRUE;
    }

    $this->dice->clearDice();
  }

  private function clear() {
    $this->dice->clearDice();
    $this->state->clear();
  }

  public function nextRound() {
    if ($this->cleardice === TRUE) {
      $this->dice->clearDice();
    }
    if ($this->cleargame === TRUE) {
      $this->state->clear();
    }
  }

  public function getMessage() {
    return $this->message;
  }

  public function getDice() {
    $ret = "";
    foreach($this->dice->getDice() as $die) {
      $ret .= $die->getImage() ."\n ";
    }
    $ret .= "<br>";

    if ($this->dice->sum() > 0) {
      $ret .= "<span class='dice-sum'>Summa: {$this->dice->sum()}</span>";
    }

    return $ret;
  }

  public function getScore() {
    return <<<EOF
      Poäng: {$this->state->get()['score']}<br>
      Runda: {$this->state->get()['round']}
EOF;
  }

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
