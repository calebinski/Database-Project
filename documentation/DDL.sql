CREATE TABLE USER (
    User_ID             INT             NOT NULL AUTO_INCREMENT,
    Username            VARCHAR(32)     NOT NULL,
    Password            VARCHAR(32)     NOT NULL,
PRIMARY KEY (User_ID),
UNIQUE(Username));

CREATE TABLE TEAM (
    Team_ID             INT             NOT NULL  AUTO_INCREMENT,
    Team_Name           VARCHAR(64)     NOT NULL,
    Owner_ID            INT             NOT NULL,
PRIMARY KEY (Team_ID),
FOREIGN KEY (Owner_ID) REFERENCES USER(User_ID));


CREATE TABLE PLAYER_CHARACTER (
    Owner_ID            INT             NOT NULL,
    Character_Name      VARCHAR(32)     NOT NULL,
    Character_Level     INT             NOT NULL,
    Character_Class     VARCHAR(16)     NOT NULL,
    Intellect           INT             NOT NULL,
    Strength            INT             NOT NULL,
    Agility             INT             NOT NULL,
    Stamina             INT             NOT NULL,
    Armor               INT             NOT NULL,
    Magic_Resist        INT             NOT NULL,
PRIMARY KEY (Owner_ID, Character_Name),
FOREIGN KEY (Owner_ID) REFERENCES USER(User_ID));

CREATE TABLE GEAR (
    Gear_ID             INT             NOT NULL  AUTO_INCREMENT,
    Gear_Name           VARCHAR(64)     NOT NULL,
    Gear_Type           VARCHAR(16)     NOT NULL,
    Intellect           INT             NOT NULL,
    Strength            INT             NOT NULL,
    Agility             INT             NOT NULL,
    Stamina             INT             NOT NULL,
    Armor               INT             NOT NULL,
    Magic_Resist        INT             NOT NULL,
PRIMARY KEY (Gear_ID));

CREATE TABLE ENEMY (
    Enemy_ID            INT             NOT NULL  AUTO_INCREMENT,
    Enemy_Name          VARCHAR(32)     NOT NULL,
    Enemy_Type          VARCHAR(16)     NOT NULL,
    Intellect           INT             NOT NULL,
    Strength            INT             NOT NULL,
    Agility             INT             NOT NULL,
    Stamina             INT             NOT NULL,
    Armor               INT             NOT NULL,
    Magic_Resist        INT             NOT NULL,
PRIMARY KEY (Enemy_ID));

CREATE TABLE EQUIPPED_GEAR (
    User_ID             INT             NOT NULL,
    Character_Name      VARCHAR(32)     NOT NULL,
    Gear_ID             INT             NOT NULL,
    Gear_Type           VARCHAR(16)     NOT NULL,
UNIQUE(User_ID, Character_Name, Gear_Type),
PRIMARY KEY (User_ID, Character_Name, Gear_ID),
FOREIGN KEY (User_ID, Character_Name) REFERENCES PLAYER_CHARACTER(Owner_ID, Character_Name),
FOREIGN KEY (Gear_ID) REFERENCES GEAR(Gear_ID));

CREATE TABLE MEMBER (
    Team_ID             INT             NOT NULL,
    User_ID             INT             NOT NULL,
    Active_Character    VARCHAR(32)     NOT NULL,
PRIMARY KEY (Team_ID, User_ID),
FOREIGN KEY (Team_ID) REFERENCES TEAM(Team_ID),
FOREIGN KEY (User_ID, Active_Character) REFERENCES PLAYER_CHARACTER(Owner_ID, Character_Name));

