<?php

class Signup extends Dbh {



    protected function setUser($uid, $pwd, $email) {

        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ?, ?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $hashedPwd, $email))) {
            $stmt = null;
            header("location: ../signup.php?error=stmtfailedtoinsert");
            exit();
        }
        
        $stmt = null;
    }


    protected function checkUser($uid, $email) {

        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;' );

        if(!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../signup.php?error=stmtfailedtoselect");
            exit();

        }

        $resultcheck;
        if($stmt->rowCount() > 0) {
            $resultcheck = false;
        }
        else {
            $resultcheck = true;
        }

        return $resultcheck;
    }

}