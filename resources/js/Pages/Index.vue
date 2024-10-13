<template>
  <div>
    <Header />
    <main class="movie-container">
      <h1 class="page-title">Movies</h1>
      <ul class="movie-list">
        <li class="movie-card" v-for="movie in movies" :key="movie.id">
          <h2 class="movie-title">{{ movie.title }}</h2>
          <p class="movie-description">{{ movie.description }}</p>
          <p class="movie-detail"><strong>Director:</strong> {{ movie.director }}</p>
          <p class="movie-detail"><strong>Release Date:</strong> {{ movie.release_date }}</p>
          <p class="movie-detail"><strong>Genre:</strong> {{ movie.genre }}</p>
          <div class="movie-actions">
            <!-- Adjusted to match Laravel routes -->
            <a :href="`/movies/${movie.id}/edit`" class="edit-button">
              <button>Edit</button>
            </a>
            <a :href="`/movies/${movie.id}`" class="show-button">
              <button>Show</button>
            </a>
          </div>
        </li>
      </ul>
    </main>
    <Footer />
  </div>
</template>

<script>
import Header from './header.vue';
import Footer from './footer.vue';

export default {
  name: 'Movies',
  components: {
    Header,
    Footer
  },
  props: {
    movies: Array
  },
  methods: {
    editMovie(id) {
      // Optional: Edit logic
      console.log(`Edit movie with id: ${id}`);
    },
    showMovie(id) {
      // Optional: Show logic
      console.log(`Show movie with id: ${id}`);
    }
  }
}
</script>

<style scoped>
.movie-container {
  background-color: #f0f4f8;
  padding: 2rem;
  min-height: 100vh;
}

.page-title {
  text-align: center;
  color: #333;
  margin-bottom: 2rem;
  font-size: 2.5rem;
}

.movie-list {
  list-style: none;
  padding: 0;
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
  justify-content: center;
}

.movie-card {
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  padding: 1.5rem;
  width: 300px;
  transition: transform 0.3s, box-shadow 0.3s;
  display: flex;
  flex-direction: column;
}

.movie-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.movie-title {
  font-size: 1.8rem;
  color: #2c3e50;
  margin-bottom: 1rem;
}

.movie-description {
  font-size: 1rem;
  color: #7f8c8d;
  margin-bottom: 1rem;
}

.movie-detail {
  font-size: 0.9rem;
  color: #34495e;
  margin-bottom: 0.5rem;
}

strong {
  color: #2980b9;
}

.movie-actions {
  display: flex;
  justify-content: space-between;
  margin-top: auto;
}

button {
  background-color: #2980b9;
  color: #fff;
  border: none;
  padding: 0.5rem 1rem;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #1c5980;
}

a {
  text-decoration: none;
}

.edit-button, .show-button {
  margin-right: 10px;
}
</style>
