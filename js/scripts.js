const search_text = document.querySelector(".search_text");

search_text.addEventListener("keydown", (event) => {
  if (event.keyCode == 13) {
    searchMovie();
	document.cookie = 'search='+search_text.value;
  }
});

async function searchMovie() {
  const request = await fetch(
    `http://www.omdbapi.com/?apikey=9da15a83&s=${search_text.value}`
  );
  const data = await request.json();
  let movies = data.Search.map((movie) => {
    return {
      title: movie.Title,
      description: `${movie.Year}/${movie.Type}`,
      imdbID: movie.imdbID,
      poster:
        movie.Poster === "N/A" ? "/assets/images/default.png" : movie.Poster,
      isFavourite: false,
    };
  });
  prepareMovies(movies);
}

function prepareMovies(movies) {
	let i=0;
  document.querySelector("#movies").innerHTML = "";
  movies.forEach((movie) => {
    let movie_card = document.createElement("movie-card");
	movie_card.setAttribute("index",i);
    movie_card.setAttribute("title", movie.title);
    movie_card.setAttribute("poster", movie.poster);
    movie_card.setAttribute("isFavourite", movie.isFavourite);
    movie_card.setAttribute("imdbID", movie.imdbID);
    movie_card.innerHTML = movie.description;

    document.querySelector("#movies").append(movie_card);
	i++
  });
}
