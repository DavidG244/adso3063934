const generationRanges = {
  1: [1, 151],
  2: [152, 251],
  3: [252, 386]
};

const container = document.getElementById("pokemon-container");
const generationSelect = document.getElementById("generation-select");
const modal = document.getElementById("pokemon-modal");
const details = document.getElementById("pokemon-details");
const backButton = document.getElementById("back-button");

generationSelect.addEventListener("change", () => {
  fetchGeneration(generationSelect.value);
});

backButton.addEventListener("click", () => {
  modal.classList.add("hidden");
  details.innerHTML = "";
});

async function fetchGeneration(gen) {
  container.innerHTML = "<p>Cargando Pokémon...</p>";
  const [start, end] = generationRanges[gen];
  const promises = [];

  for (let i = start; i <= end; i++) {
    promises.push(fetch(`https://pokeapi.co/api/v2/pokemon/${i}`).then(res => res.json()));
  }

  try {
    const pokemonList = await Promise.all(promises);
    renderPokemon(pokemonList);
  } catch (error) {
    container.innerHTML = "<p>Error al cargar los Pokémon. Intenta de nuevo.</p>";
    console.error(error);
  }
}

function renderPokemon(list) {
  container.innerHTML = "";
  list.forEach(pokemon => {
    const types = pokemon.types.map(t => t.type.name).join(", ");
    const card = document.createElement("div");
    card.className = "card";
    card.innerHTML = `
      <img src="${pokemon.sprites.front_default}" alt="${pokemon.name}" />
      <h3>#${String(pokemon.id).padStart(3, '0')} ${pokemon.name}</h3>
      <p>Tipo: ${types}</p>
    `;
    card.addEventListener("click", () => showDetails(pokemon));
    container.appendChild(card);
  });
}

function showDetails(pokemon) {
  const stats = pokemon.stats.map(stat =>
    `<p><strong>${stat.stat.name}:</strong> ${stat.base_stat}</p>`
  ).join("");

  details.innerHTML = `
    <h2>${pokemon.name} (#${pokemon.id})</h2>
    <img src="${pokemon.sprites.front_default}" />
    <p>Tipos: ${pokemon.types.map(t => t.type.name).join(", ")}</p>
    ${stats}
  `;

  modal.classList.remove("hidden");
}

fetchGeneration(1);
