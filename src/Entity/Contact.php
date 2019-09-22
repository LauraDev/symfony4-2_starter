<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{

  /**
   * @var string|null
   * @Assert\NotBlank()
   * @Assert\Length(min=2, max=100)
   */
  private $firstName;

  /**
   * @var string|null
   * @Assert\NotBlank()
   * @Assert\Length(min=2, max=100)
   */
  private $lastName;

  /**
   * @var string|null
   * @Assert\NotBlank()
   * @Assert\Regex(
   * pattern="/[0-9]{10}/"
   * )
   */
  private $phone;

  /**
   * @var string|null
   * @Assert\NotBlank()
   * @Assert\Email()
   */
  private $mail;

  /**
   * @var string|null
   * @Assert\NotBlank()
   * @Assert\Length(min=10)
   */
  private $message;

  /**
   * Get the value of firstName
   *
   * @return  string|null
   */ 
  public function getFirstName(): ?string
  {
    return $this->firstName;
  }

  /**
   * Set the value of firstName
   *
   * @param  string|null  $firstName
   *
   * @return  self
   */ 
  public function setFirstName($firstName): self
  {
    $this->firstName = $firstName;

    return $this;
  }

  /**
   * Get the value of lastName
   *
   * @return  string|null
   */ 
  public function getLastName(): ?string
  {
    return $this->lastName;
  }

  /**
   * Set the value of lastName
   *
   * @param  string|null  $lastName
   *
   * @return  self
   */ 
  public function setLastName($lastName): self
  {
    $this->lastName = $lastName;

    return $this;
  }

  /**
   * Get pattern="/[0-9]{10/"}
   *
   * @return  string|null
   */ 
  public function getPhone(): ?string
  {
    return $this->phone;
  }

  /**
   * Set pattern="/[0-9]{10/"}
   *
   * @param  string|null  $phone  pattern="/[0-9]{10/"}
   *
   * @return  self
   */ 
  public function setPhone($phone): self
  {
    $this->phone = $phone;

    return $this;
  }

  /**
   * Get the value of mail
   *
   * @return  string|null
   */ 
  public function getMail(): ?string
  {
    return $this->mail;
  }

  /**
   * Set the value of mail
   *
   * @param  string|null  $mail
   *
   * @return  self
   */ 
  public function setMail($mail): self
  {
    $this->mail = $mail;

    return $this;
  }

  /**
   * Get the value of message
   *
   * @return  string|null
   */ 
  public function getMessage(): ?string
  {
    return $this->message;
  }

  /**
   * Set the value of message
   *
   * @param  string|null  $message
   *
   * @return  self
   */ 
  public function setMessage($message): self
  {
    $this->message = $message;

    return $this;
  }
}
