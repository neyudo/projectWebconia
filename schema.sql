DROP DATABASE IF EXISTS project;

CREATE DATABASE IF NOT EXISTS project;

USE project;

/* 
    Tabele conference
  */
CREATE TABLE conference(
    conference_id   INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    conference_city            VARCHAR(30) NOT NULL,
    conference_year            TIMESTAMP NOT NULL DEFAULT NOW(),
    conference_international   boolean DEFAULT false,
    conference_image   VARCHAR(255) DEFAULT 'no-poster.jpg'
);

 INSERT INTO conference(
    conference_city,
    conference_year,
    conference_international,
    conference_image
    ) VALUES
    (
        'Hamburg',
        NOW(),
        false,
        'hamburg.jpg'
        ),
    (
        'Guayaquil',
        NOW(),
        true,
        'guayaquil.jpg'
        ),
    (
        'Pamplona',
        NOW(),
        false,
        'pamplona.jpg'
        ),
    (
        'Sofia',
        NOW(),
        true,
        'sofia.jpg'
        );
/* 
    Producten
 */

CREATE TABLE comments(
    comment_id              INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    comment_author          VARCHAR(100) NOT NULL,
    comment_email           VARCHAR(255) UNIQUE NOT NULL ,
    comment_text            TEXT, 
    conference_id           INTEGER UNSIGNED,
    /* Beziegung zwichen conference(conference_id) */
    FOREIGN KEY (conference_id) REFERENCES conference(conference_id)
    /* Wenn ich etwas lösche und diese ID ist in gebraucht bekomme ich eine Fehlermeldung,
        wenn ich aktualisiere bei conference wird das wie ein Wasserfall sich aktualisieren in products
     */
        ON DELETE RESTRICT ON UPDATE CASCADE,
    comment_create_date     DATE NOT NULL
);

INSERT INTO comments(
    comment_author,
    comment_email,
    comment_text,
    conference_id,
    comment_create_date
) VALUES (
    'Papi',
    '1@1.com',
    'Lorem ipsum xxxxxxx',
    1,
    CURDATE()
),
(
    'Mami',
    '2@1.com',
    'Lorem ipsum yyyyyyy',
    2,
    CURDATE()
),
(
    'Mami1',
    '3@1.com',
    'Lorem ipsum yyyyyyy',
    2,
    CURDATE()
),
(
    'Papi1',
    '3@2.com',
    'Lorem ipsum yyyyyyy',
    4,
    CURDATE()
),
(
    'Bubi',
    '4@1.com',
    'Lorem ipsum bbbbbbbb',
    3,
    CURDATE()
);


