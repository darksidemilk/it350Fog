<?php
include 'db_connect.php';
    $query="
    
    CREATE TABLE Monitor(
                         computerHostname VARCHAR(255),
                         manufacturer VARCHAR(50),
                         byuSticker VARCHAR(90) PRIMARY KEY NOT NULL,
                         computer VARCHAR(20),
                         size INT(10),
                         purchaseRecordid INT(10)
                         );
    CREATE TABLE Computer(
                          byuSticker VARCHAR(90) NOT NULL,
                          mac VARCHAR(18),
                          os VARCHAR(50),
                          make VARCHAR(50),
                          serialnumber VARCHAR(250) NOT NULL,
                          hostname VARCHAR(100) PRIMARY KEY NOT NULL,
                          purchaseRecordid INT(10),
                          subnetGateway VARCHAR(30)
                          );
    
    CREATE TABLE Printer(
                         byuSticker VARCHAR(90) PRIMARY KEY NOT NULL,
                         mac VARCHAR(18),
                         ip VARCHAR(16),
                         make VARCHAR(50),
                         name VARCHAR(50) NOT NULL,
                         type VARCHAR(50),
                         purchaseRecordId INT(20)
                         );
    
    CREATE TABLE Building(
                          buildingName VARCHAR(20) PRIMARY KEY NOT NULL
                          );
    
    CREATE TABLE Room(
                      buildingName VARCHAR(20),
                      type VARCHAR(10),
                      name VARCHAR(20) PRIMARY KEY NOT NULL
                      );
    
    CREATE TABLE Subnet(
                        gatewayIP VARCHAR(30) PRIMARY KEY NOT NULL
                        );
    
    CREATE TABLE Projector(
                           make VARCHAR(20),
                           byuTag VARCHAR(90) PRIMARY KEY NOT NULL,
                           roomName VARCHAR(20) NOT NULL
                           );
    
    CREATE TABLE User(
                      firstname VARCHAR(50) NOT NULL,
                      lastname VARCHAR(50) NOT NULL,
                      netid VARCHAR(30) UNIQUE NOT NULL,
                      userId INT PRIMARY KEY NOT NULL AUTO_INCREMENT
                      );
    
    CREATE TABLE Checkout_item(
                               type VARCHAR(30) NOT NULL,
                               byusticker VARCHAR(50) PRIMARY KEY NOT NULL,
                               currentUser INT,
                               status INT,
                               dueDate DATE NOT NULL,
                               amountOverdue INT,
                               purchaseRecordId INT
                               );
    
    CREATE TABLE Purchase_record(
                                 id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                                 date DATE,
                                 numItems INT,
                                 cost INT NOT NULL,
                                 purpose VARCHAR(50),
                                 intendedLocation VARCHAR(40)
                                 );
    
    CREATE TABLE Has_users(
                           userId INT,
                           roomName VARCHAR(20)
                           );
    
    CREATE TABLE Has_subnets(
                             subnetGateway VARCHAR(30),
                             roomName VARCHAR(20)
                             );
    
    CREATE TABLE Has_phone(
                           userId INT,
                           phone VARCHAR(15)
                           );
    
    CREATE TABLE Has_email(
                           userId INT,
                           email VARCHAR(50)
                           );
    
    CREATE TABLE Has_position(
                              userId INT,
                              position VARCHAR(40)
                              );
    
    CREATE TABLE Has_roomid(
                            subnetGateway VARCHAR(30),
                            roomId VARCHAR(15)
                            );
";
    mysql_query($query,$conn)or die(mysql_error());
?>