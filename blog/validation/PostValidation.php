<?php

class PostValidation {
  public function validateInputs($title, $content) {
    if(empty($title) || empty($content)) {
      return 'Error: missing values, unable to create post';
    } 
    return 'Success';
  }
}