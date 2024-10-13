<template>
  <header>
    <nav>
      <ul>
        <li><router-link to="/">Home</router-link></li>
        <li><router-link to="/movies">Movies</router-link></li>
      </ul>
      <div class="buttons">
        <button @click="createItem" class="create-button">Create New Movie</button>
      </div>
    </nav>
  </header>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
  name: 'Header',
  methods: {
    createItem() {
     Inertia.get(route('movies.create'));
    }
  }
}
</script>

<style scoped>
header {
  background-color: #333;
  color: white;
  padding: 1rem;
}
nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
nav ul {
  list-style: none;
  display: flex;
  gap: 1rem;
}
nav ul li {
  display: inline;
}
.buttons {
  display: flex;
  gap: 1rem;
}
.create-button {
  background-color: #28a745;
  color: white;
  border: none;
  padding: 0.5rem 1rem;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s;
}
.create-button:hover {
  background-color: #218838;
}
</style>
