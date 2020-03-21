SELECT name FROM movies WHERE `year`=1995;
SELECT COUNT(role) FROM roles JOIN movies ON movies.id=roles.movie_id WHERE movies.name="Lost in Translation";
	SELECT first_name, last_name FROM actors JOIN roles ON roles.actor_id=actors.id JOIN movies ON movies.id=roles.movie_id WHERE movies.name="Lost in Translation";
	SELECT first_name, last_name FROM directors 
																						JOIN movies_directors ON directors.id=movies_directors.director_id 
																						JOIN movies ON movies.id=movies_directors.movie_id 
																						WHERE movies.name="Fight Club";
SELECT COUNT(name) FROM movies 
																						JOIN movies_directors ON movies.id=movies_directors.movie_id 
																						JOIN directors ON directors.id=movies_directors.director_id 
																						WHERE directors.first_name="Clint" AND directors.last_name="Eastwood";
SELECT name FROM movies 
																						JOIN movies_directors ON movies.id=movies_directors.movie_id 
																						JOIN directors ON directors.id=movies_directors.director_id 
																						WHERE directors.first_name="Clint" AND directors.last_name="Eastwood";
SELECT first_name, last_name FROM directors 
																						JOIN directors_genres ON directors.id=directors_genres.director_id WHERE directors_genres.genre="Horror";																				
SELECT actors.first_name, actors.last_name FROM actors 
																						JOIN roles ON actors.id=roles.actor_id 
																						JOIN movies ON movies.id=roles.movie_id
																						JOIN movies_directors ON movies.id=movies_directors.movie_id
																						JOIN directors ON directors.id=movies_directors.director_id
																						WHERE directors.first_name="Christopher" AND directors.last_name="Nolan";