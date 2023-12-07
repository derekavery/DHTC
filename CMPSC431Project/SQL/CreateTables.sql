CREATE TABLE User(
    userID INT AUTO_INCREMENT,
    uname VARCHAR(50),
    email VARCHAR(50) UNIQUE,
    password VARCHAR(80),
    currency INT NOT NULL DEFAULT 1000,
    PRIMARY KEY (userID)
);

CREATE TABLE Team(
    team_name VARCHAR(50),
    record VARCHAR(20),
    gf INT DEFAULT 0,
    ga INT DEFAULT 0,
    PRIMARY KEY (team_name)
);

CREATE TABLE Pack(
    packID INT,
    Cost INT DEFAULT 0,
    PRIMARY KEY (packID)
);

CREATE TABLE Card (
    cardID INT AUTO_INCREMENT,
    card_lvl INT DEFAULT 1,
    packID INT,
    player_name VARCHAR(50),
    num INT,
    goals INT DEFAULT 0,
    assists INT DEFAULT 0,
    games_played INT DEFAULT 0,
    plus_minus INT DEFAULT 0,
    card_type VARCHAR(30),
    discard_value INT DEFAULT 0,
    PRIMARY KEY (cardID, card_lvl),
    FOREIGN KEY (packID) REFERENCES Pack(packID)
    ON DELETE RESTRICT
);

CREATE TABLE Trade(
    tradeID INT AUTO_INCREMENT,
    date DATETIME,
    status VARCHAR(20),
    PRIMARY KEY (tradeID)
);

CREATE TABLE Owns (
    userID INT,
    cardID INT,
    card_lvl INT DEFAULT 1,
    quantity INT DEFAULT 1,
    PRIMARY KEY (userID, cardID, card_lvl),
    FOREIGN KEY (userID) REFERENCES User(userID) ON DELETE CASCADE,
    FOREIGN KEY (cardID, card_lvl) REFERENCES Card(cardID, card_lvl) ON DELETE RESTRICT
);

CREATE TABLE Trader1(
    tradeID INT,
    userID INT,
    cardID INT,
    card_lvl INT,
    PRIMARY KEY (tradeID, userID, cardID, card_lvl),
    FOREIGN KEY (tradeID) REFERENCES Trade(tradeID) ON DELETE CASCADE,
    FOREIGN KEY (userID) REFERENCES User(userID) ON DELETE CASCADE,
    FOREIGN KEY (cardID, card_lvl) REFERENCES Card(cardID, card_lvl) ON DELETE RESTRICT
);

CREATE TABLE Trader2(
    tradeID INT,
    userID INT,
    cardID INT,
    card_lvl INT,
    PRIMARY KEY (tradeID, userID, cardID, card_lvl),
    FOREIGN KEY (tradeID) REFERENCES Trade(tradeID) ON DELETE CASCADE,
    FOREIGN KEY (userID) REFERENCES User(userID) ON DELETE CASCADE,
    FOREIGN KEY (cardID, card_lvl) REFERENCES Card(cardID, card_lvl) ON DELETE RESTRICT
);

CREATE TABLE Friends(
    userID1 INT,
    userID2 INT,
    PRIMARY KEY (userID1, userID2),
    FOREIGN KEY (userID1) REFERENCES User(userID) ON DELETE CASCADE,
    FOREIGN KEY (userID2) REFERENCES User(userID) ON DELETE CASCADE
);


CREATE TABLE Playsfor(
    team_name VARCHAR(50),
    cardID INT,
    card_lvl INT,
    PRIMARY KEY (team_name, cardID, card_lvl),
    FOREIGN KEY (team_name) REFERENCES Team(team_name) ON DELETE CASCADE,
    FOREIGN KEY (cardID, card_lvl) REFERENCES Card(cardID, card_lvl) ON DELETE CASCADE
);