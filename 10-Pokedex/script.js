const generationRanges = {
  1: [1, 151],
  2: [152, 251],
  3: [252, 386]
};

// Variables globales
let allPokemon = [];
let currentGeneration = 1;

// Elementos del DOM
const container = document.getElementById("pokemon-container");
const generationSelect = document.getElementById("generation-select");
const searchInput = document.getElementById("search-input");
const clearButton = document.getElementById("clear-search");
const modal = document.getElementById("pokemon-modal");
const details = document.getElementById("pokemon-details");
const backButton = document.getElementById("back-button");

// Event listeners
generationSelect.addEventListener("change", () => {
  currentGeneration = generationSelect.value;
  clearSearch();
  fetchGeneration(currentGeneration);
});

searchInput.addEventListener("input", (e) => {
  const searchTerm = e.target.value.trim();
  handleSearch(searchTerm);
});

clearButton.addEventListener("click", () => {
  clearSearch();
});

backButton.addEventListener("click", () => {
  modal.classList.add("hidden");
  details.innerHTML = "";
});

// Función para manejar la búsqueda
function handleSearch(searchTerm) {
  if (searchTerm.length === 0) {
    clearButton.style.display = "none";
    renderPokemon(allPokemon);
    return;
  }

  clearButton.style.display = "flex";
  
  // Filtrar Pokémon por nombre o número
  const filteredPokemon = allPokemon.filter(pokemon => {
    const name = pokemon.name.toLowerCase();
    const id = pokemon.id.toString();
    const search = searchTerm.toLowerCase();
    
    return name.includes(search) || id.includes(search);
  });

  if (filteredPokemon.length === 0) {
    container.innerHTML = `<p>No se encontraron Pokémon que coincidan con "${searchTerm}"</p>`;
  } else {
    renderPokemon(filteredPokemon);
  }
}

// Función para limpiar la búsqueda
function clearSearch() {
  searchInput.value = "";
  clearButton.style.display = "none";
  if (allPokemon.length > 0) {
    renderPokemon(allPokemon);
  }
}

// Función para cargar una generación
async function fetchGeneration(gen) {
  container.innerHTML = "<p>Cargando Pokémon...</p>";
  const [start, end] = generationRanges[gen];
  const promises = [];

  for (let i = start; i <= end; i++) {
    promises.push(fetch(`https://pokeapi.co/api/v2/pokemon/${i}`).then(res => res.json()));
  }

  try {
    const pokemonList = await Promise.all(promises);
    allPokemon = pokemonList;
    renderPokemon(allPokemon);
  } catch (error) {
    container.innerHTML = "<p>Error al cargar los Pokémon. Intenta de nuevo.</p>";
    console.error(error);
  }
}

// Función para renderizar Pokémon
function renderPokemon(list) {
  container.innerHTML = "";
  
  list.forEach((pokemon, index) => {
    const types = pokemon.types.map(t => t.type.name).join(", ");
    const card = document.createElement("div");
    card.className = "card";
    card.style.animationDelay = `${index * 0.1}s`;
    
    card.innerHTML = `
      <img src="${pokemon.sprites.front_default}" alt="${pokemon.name}" />
      <h3>#${String(pokemon.id).padStart(3, '0')} ${pokemon.name}</h3>
      <p>Tipo: ${types}</p>
    `;
    
    card.addEventListener("click", () => showDetails(pokemon));
    container.appendChild(card);
  });
}

// Función para mostrar detalles del Pokémon
function showDetails(pokemon) {
  const stats = pokemon.stats.map(stat =>
    `<p><strong>${stat.stat.name}:</strong> ${stat.base_stat}</p>`
  ).join("");

  details.innerHTML = `
    <h2>${pokemon.name} (#${pokemon.id})</h2>
    <img src="${pokemon.sprites.front_default}" alt="${pokemon.name}" />
    <p><strong>Tipos:</strong> ${pokemon.types.map(t => t.type.name).join(", ")}</p>
    <p><strong>Altura:</strong> ${pokemon.height / 10} m</p>
    <p><strong>Peso:</strong> ${pokemon.weight / 10} kg</p>
    <div style="margin-top: 1rem;">
      <h3 style="color: var(--text-light); margin-bottom: 0.5rem;">Estadísticas Base:</h3>
      ${stats}
    </div>
  `;

  modal.classList.remove("hidden");
}

// Función para manejar el teclado
document.addEventListener("keydown", (e) => {
  // Escape para cerrar modal
  if (e.key === "Escape" && !modal.classList.contains("hidden")) {
    modal.classList.add("hidden");
    details.innerHTML = "";
  }
  
  // Ctrl/Cmd + K para enfocar la búsqueda
  if ((e.ctrlKey || e.metaKey) && e.key === "k") {
    e.preventDefault();
    searchInput.focus();
  }
});

// Cargar la primera generación al iniciar
fetchGeneration(currentGeneration);