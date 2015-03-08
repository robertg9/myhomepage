CREATE TABLE IF NOT EXISTS user(
    id MEDIUMINT NOT NULL AUTO_INCREMENT,
    login VARCHAR(40) UNIQUE,
    pass CHAR(32),
    timecreate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    accounttype enum('publicacc','private') DEFAULT 'publicacc',
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS links(
    id MEDIUMINT NOT NULL AUTO_INCREMENT,
    userlink TEXT,
    domainname VARCHAR(255),
    timecreate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    userid MEDIUMINT NOT NULL,
    PRIMARY KEY(id)
);