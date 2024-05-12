<?php

require("class.userLogger.php");
require("class.pdofactory.php");

print "Running...<br />";

$strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
$objPDO = PDOFactory::GetPDO($strDSN, "postgres", "fpllefia123",array());
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$objUser = new User($objPDO);
$objUser2 = new User($objPDO);
$objUser3 = new User($objPDO);

$objUser->setFirstName("user1");
$objUser->setLastName("lastNameUser1");
$objUser->setEmailAddress("user1@test.com");
$objUser->setDateAccountCreated(date("Y-m-d"));

$objUser2->setFirstName("user2");
$objUser2->setLastName("lastNameUser2");
$objUser2->setEmailAddress("user2@test.com");
$objUser2->setDateAccountCreated(date("Y-m-d"));

$objUser3->setFirstName("user3");
$objUser3->setLastName("lastNameUser3");
$objUser3->setEmailAddress("user3@test.com");
$objUser3->setDateAccountCreated(date("Y-m-d"));

$objUser->Save();
$objUser2->Save();
$objUser3->Save();

echo $objUser;
echo $objUser2;
echo $objUser3;

$objUser->setErrorLogMessage("JAJAJAJA");
$objUser->getErrorLogMessage("JAJAJAJA");

$objUser->setPassword("JAJAJAJA");
$objUser2->setPassword("Password123");
$objUser3->setPassword("123456");

$objUser->Save();
$objUser2->Save();
$objUser3->Save();

$objUser = new User($objPDO, 8);
$objUser2 = new User($objPDO, 9);
$objUser3 = new User($objPDO, 10);

echo $objUser;
echo $objUser2;
echo $objUser3;

$objUser->MarkForDeletion();
$objUser2->MarkForDeletion();

unset($objNewUser);
unset($objNewUser2);
unset($objNewUser3);