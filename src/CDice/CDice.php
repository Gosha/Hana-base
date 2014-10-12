<?php
/**
 * Class for a dice
 *
 */
class CDice
{

  /**
   * Properties
   */
  private $value;
  public function setValue($value) { $this->value = $value; }
  public function getValue() { return $this->value; }

  private $sides;
  public function setSides($sides) { $this->sides = $sides; }
  public function getSides() { return $this->sides; }

  /**
   * Constructor
   *
   * @param value Initial dice value
   * @param sides Sides of the dice
   */
  public function __construct($value = -1, $sides = 6) {
    $this->setSides($sides);

    if ($value == -1) {
      $value = rand(1, $sides);
    }

    $this->setValue($value);
  }

  public function getImage() {
    return <<<EOF
    <img class="dice-image" src="img/dice/{$this->value}.png" />
EOF;
  }
}

