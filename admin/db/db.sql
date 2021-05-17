CREATE TABLE ADMIN(
    ID VARCHAR(10) PRIMARY KEY,
    FULL_NAME VARCHAR(50) NOT NULL,
    EMAIL VARCHAR(320) NOT NULL UNIQUE,
    PASSWORD VARBINARY(511) NOT NULL,
    PROFILE_PIC_LOCATION VARCHAR(255),
    BIO TEXT
);
CREATE TABLE USER(
    ID VARCHAR(10) PRIMARY KEY,
    FULL_NAME VARCHAR(50) NOT NULL,
    EMAIL VARCHAR(320) NOT NULL,
    PHONE VARCHAR(15) NOT NULL UNIQUE,
    PASSWORD VARBINARY(511) NOT NULL,
    BIO TEXT
);
CREATE TABLE POST(
    ID VARCHAR(10) PRIMARY KEY,
    TITLE VARCHAR(100) UNIQUE NOT NULL,
    TITLE_SLAG VARCHAR(100) UNIQUE NOT NULL,
    AUTHOR VARCHAR(10) NOT NULL,
    DATE DATE NOT NULL,
    CONTENT TEXT NOT NULL,
    FOREIGN KEY(AUTHOR) REFERENCES ADMIN(ID)
);
CREATE TABLE TAG(
    ID VARCHAR(5) PRIMARY KEY,
    NAME VARCHAR(25) NOT NULL UNIQUE
);
CREATE TABLE USED_TAGS(
    ID VARCHAR(10) PRIMARY KEY,
    POST_ID VARCHAR(10) NOT NULL,
    TAG_ID VARCHAR(5) NOT NULL,
    FOREIGN KEY(POST_ID) REFERENCES POST(ID),
    FOREIGN KEY(TAG_ID) REFERENCES TAG(ID)
);