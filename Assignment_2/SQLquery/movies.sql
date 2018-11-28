use gc200397613;

CREATE TABLE movies(
  movie_id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(100),
  genre VARCHAR(50),
  release_date VARCHAR(50),
  rating DECIMAL(7,2),
  photo VARCHAR(100),
  PRIMARY KEY(movie_id)
);

select * from movies;