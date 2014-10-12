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
  }

  private function save() {
    $this->state->get()['score'] += $this->dice->sum();
    $this->state->get()['round'] += 1;
    $this->dice->clearDice();
  }

  private function clear() {
    $this->dice->clearDice();
    $this->state->clear();
  }

  public function getState() {
    return "Hej";
  }

  public function getDice() {
    $ret = "";
    foreach($this->dice->getDice() as $die) {
      $ret .= $die->getImage() ."\n ";
    }

    return $ret;
  }

  public function getButtons() {
    $ret = "";
    $curURL = current_url();

    $ret .= <<<EOF
      <a href="{$curURL}?game_action=roll">Kasta</a>
      <a href="{$curURL}?game_action=save">Spara</a>
      <a href="{$curURL}?game_action=clear">Rensa</a>
EOF;

    $ret .= dump($this->state->get(), 1);

    return $ret;
  }
}
