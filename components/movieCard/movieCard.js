const template = document.createElement("template");
template.innerHTML = `
<style>
@import url('http://${location.host}/components/movieCard/movieCard.css')
</style>
<div class="movie-container">
    <div class="image-container">
        <img />
    </div>
    <div class="info">
        <h3 class="title"></h3>
		<p class="index" hidden></p>
        <p>
            <slot />
        </p>
        <div class="action_container">
            <a href="link" id="isFavourite"><i class="isFavourite fa fa-heart"></i></a>
            <a href="link" id="isBookmarked"><i class="isBookmarked fas fa-bookmark"></i></a>
            <a target="_blank" class="button">IMDb</a>
        </div>
        <div class="bs-example">
</div>
    </div>
`;

class MovieCard extends HTMLElement {
  constructor() {
    super();

    this.isFavourite = false;
    this.isBookmarked = false;

    this.attachShadow({ mode: "open" });
    this.shadowRoot.appendChild(template.content.cloneNode(true));

    setTimeout(() => {
      this.shadowRoot.querySelector("h3.title").innerHTML =
        this.getAttribute("title");
		this.shadowRoot.querySelector("p.index").innerHTML =
        this.getAttribute("index");
      this.shadowRoot.querySelector("img").src = this.getAttribute("poster");
	  this.shadowRoot.querySelector("#\\isFavourite").href = "functions.php?fav=1&id="+this.getAttribute("index");
	  this.shadowRoot.querySelector("#\\isBookmarked").href = "functions.php?fav=2&id="+this.getAttribute("index");
      this.shadowRoot
        .querySelector(".button")
        .setAttribute(
          "href",
          `https://imdb.com/title/${this.getAttribute("imdbID")}`
        );

      if (this.getAttribute("isFavourite") == "true") {
        this.isFavourite = true;
        this.shadowRoot
          .querySelector(".isFavourite")
          .classList.add("is_favourite");
      }
      if (this.getAttribute("isBookmarked") == "true") {
        this.isBookmarked = true;
        this.shadowRoot
          .querySelector(".isBookmarked")
          .classList.add("is_bookmarked");
      }
    }, 100);
  }

  favToggle() {
    this.isFavourite = !this.isFavourite;

    if (this.isFavourite) {
      this.shadowRoot
        .querySelector(".isFavourite")
        .classList.add("is_favourite");
    } else {
      this.shadowRoot
        .querySelector(".isFavourite")
        .classList.remove("is_favourite");
    }
  }

  bookToggle() {
    this.isBookmarked = !this.isBookmarked;

    if (this.isBookmarked) {
      this.shadowRoot
        .querySelector(".isBookmarked")
        .classList.add("is_bookmarked");
    } else {
      this.shadowRoot
        .querySelector(".isBookmarked")
        .classList.remove("is_bookmarked");
    }
  }

  connectedCallback() {
    this.shadowRoot
      .querySelector(".isFavourite")
      .addEventListener("click", () => {
        this.favToggle();
      });

    this.shadowRoot
      .querySelector(".isBookmarked")
      .addEventListener("click", () => {
        this.bookToggle();
      });
  }

  disconnectedCallback() {
    this.shadowRoot
      .querySelector(".isFavourite")
      .removeEventListener("click", this.favToggle());

    this.shadowRoot
      .querySelector(".isBookmarked")
      .removeEventListener("click", this.bookToggle());
  }
}

window.customElements.define("movie-card", MovieCard);
