<?php
/**
 * Class for a variable saved in $_SESSION
 *
 * Encapsulates the saving and restoring of the variable
 */
class CSessionVar
{
  private $data;
  private $name;
  private $default;

  /**
   *
   * @param name Which name to save with in $_SESSION
   * @param default What value to use if variable doesn't exist in $_SESSION
   */
  public function __construct($name, $default) {
    $this->name = $name;
    $this->default = $default;
    $this->data = $default;

    if (isset($_SESSION[$name])) {
      $this->data = $_SESSION[$name];
    }
  }

  public function __destruct() {
    // Save data to $_SESSION
    if (isset($this->data)) {
      $_SESSION[$this->name] = $this->data;
    } elseif (isset($_SESSION[$this->name])) {
      // Destroy session variable if data was cleared
      unset($_SESSION[$this->name]);
    }
  }

  public function set($data) {
    $this->data = $data;
  }

  public function &get() {
    return $this->data;
  }

  public function clear() {
    // Data is cleared from $_SESSION in __destruct
    if (isset($this->data))
      $this->data = $this->default;
  }
}
