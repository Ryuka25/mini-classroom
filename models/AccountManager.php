<?php

require_once('Manager.php');
require_once('Account.php');


class AccountManager extends Manager {

    public function getAccountByUsername($username) {
        $sql = "SELECT * FROM `Accounts` WHERE `accountID` = :accountID";
        $query = $this->getDatabase()->prepare($sql);

        $query->bindparam(":accountID", $username);
        $query->execute();

        $dataAccount = $query->fetch(PDO::FETCH_ASSOC);

        if ($dataAccount){
            $result = new Account($dataAccount);
            return $result;
        }

        return false;
    }
}

// $accountManager = new AccountManager();
// $account = $accountManager->getAccountByUsername('user_1');

// var_dump($account);