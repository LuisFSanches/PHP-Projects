<?php

class UserValidation {

  public function validateSignUpInputs($name, $username, $email, $password, $passwordConfirmation) {
    if(empty($name) || empty($username) || empty($email) || empty($password) || empty($passwordConfirmation)) {
      return 'Error: missing values, unable to save user';
    } 
    return 'Success';
  }

  public function validateSignInInputs($username, $password) {
    if(empty($username) || empty($password)) {
      return 'Error: missing values, unable to save user';
    } 
    return 'Success';
  }

  public function validateEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == null) {
      return 'Error: invalid email';
    }
    return 'Success';
  }

  public function validateUsername($username) {
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      return 'Error: invalid username';
    }
    return 'Success';
  }

  public function validatePassword($password, $passwordConfirmation) {
    if ($password !== $passwordConfirmation) {
      return 'Error: password dont match';
    }
    return 'Success';
  }
  
}