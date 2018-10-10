<?php

class ExceptionHandler {
    
}

class DBExceptionHandle extends PDOException {

    public function __construct(PDOException $e) {
        return $e->getMessage();
    }

}

?>