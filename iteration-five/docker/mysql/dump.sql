create table if not exists movies.tblmovies(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    director VARCHAR(255) not null,
    release_date VARCHAR(30) not null,
    stars VARCHAR(255) not null,
    synopsis TEXT NOT NULL,
    genre VARCHAR(255) NOT NULL
) ENGINE INNODB;

INSERT INTO movies.tblmovies (title, director, release_date, stars, synopsis, genre)
VALUES ('Hot Fuzz',
        'Edgar Wright',
        '2007/02/14',
        'Exceptional London cop Nicholas Angel is involuntarily transferred to a quaint English village and paired with a witless new partner. While on the beat, Nicholas suspects a sinister conspiracy is afoot with the residents.',
        'Simon Pegg, Nick Frost, Martin Freeman',
        'action, comedy, mystery');
