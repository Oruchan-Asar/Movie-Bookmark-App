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
        <p>
            <slot />
        </p>
        <div class="action_container">
            <i class="isFavourite fa fa-heart"></i>
            <a target="_blank" class="button">IMDb</a>
        </div>
    </div>
</div>
`;

class MovieCard extends HTMLElement {
  constructor() {
    super();

    this.attachShadow({ mode: "open" });
    this.shadowRoot.appendChild(template.content.cloneNode(true));

    setTimeout(() => {
      this.shadowRoot.querySelector("h3.title").innerHTML =
        this.getAttribute("title");
      this.shadowRoot.querySelector("img").src = this.getAttribute("poster");
    }, 100);
  }
}

window.customElements.define("movie-card", MovieCard);
