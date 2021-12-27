let movies = [
  {
    title: "The Man From Earth 1",
    description: `John üniversiteden ayrilip, başka bir yere gitmeye karar vermiş, akademisyen arkadaşlari da ona veda etmek için evine gelmişlerdir. Arkadaşlari John'u kalmasi için ikna etmeye çalişirken, John büyük sirrini ortaya dökecek ve herkesi büyük bir şaşkinliğa sürükleyecekti`,
    poster:
      "https://upload.wikimedia.org/wikipedia/en/3/3b/The_Man_from_Earth.png",
    isFavourite: true,
  },
  {
    title: "The Man From Earth 2",
    description: `John üniversiteden ayrilip, başka bir yere gitmeye karar vermiş, akademisyen arkadaşlari da ona veda etmek için evine gelmişlerdir. Arkadaşlari John'u kalmasi için ikna etmeye çalişirken, John büyük sirrini ortaya dökecek ve herkesi büyük bir şaşkinliğa sürükleyecekti`,
    poster:
      "https://upload.wikimedia.org/wikipedia/en/3/3b/The_Man_from_Earth.png",
    isFavourite: false,
  },
  {
    title: "The Man From Earth 3",
    description: `John üniversiteden ayrilip, başka bir yere gitmeye karar vermiş, akademisyen arkadaşlari da ona veda etmek için evine gelmişlerdir. Arkadaşlari John'u kalmasi için ikna etmeye çalişirken, John büyük sirrini ortaya dökecek ve herkesi büyük bir şaşkinliğa sürükleyecekti`,
    poster:
      "https://upload.wikimedia.org/wikipedia/en/3/3b/The_Man_from_Earth.png",
    isFavourite: true,
  },
];

function prepareMovies(movies) {
  movies.forEach((movie) => {
    let movie_card = document.createElement("movie-card");
    movie_card.setAttribute("title", movie.title);
    movie_card.setAttribute("poster", movie.poster);
    movie_card.innerHTML = movie.description;

    document.querySelector("#movies").append(movie_card);
  });
}

prepareMovies(movies);
