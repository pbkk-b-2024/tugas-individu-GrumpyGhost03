<template>
    <div>
      <Header />
      <main class="movie-form-container">
        <div class="form-header">
          <h1>Edit Movie</h1>
        </div>
  
        <form @submit.prevent="submitForm" class="movie-form">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" v-model="form.title" class="form-input" required>
          </div>
  
          <div class="form-group">
            <label for="description">Description</label>
            <textarea v-model="form.description" class="form-input textarea"></textarea>
          </div>
  
          <div class="form-group">
            <label for="director">Director</label>
            <input type="text" v-model="form.director" class="form-input">
          </div>
  
          <div class="form-group">
            <label for="release_date">Release Date</label>
            <input type="date" v-model="form.release_date" class="form-input">
          </div>
  
          <div class="form-group">
            <label for="genre">Genre</label>
            <input type="text" v-model="form.genre" class="form-input">
          </div>
  
          <button type="submit" class="submit-button">Update Movie</button>
        </form>
      </main>
      <Footer />
    </div>
  </template>
  
  <script>
  import Header from './header.vue';
  import Footer from './footer.vue';
  import { Inertia } from '@inertiajs/inertia';
  
  export default {
    props: {
      movie: Object
    },
    data() {
      return {
        form: {
          title: this.movie.title,
          description: this.movie.description,
          director: this.movie.director,
          release_date: this.movie.release_date,
          genre: this.movie.genre
        }
      };
    },
    methods: {
      submitForm() {
        Inertia.put(`/movies/${this.movie.id}`, this.form);
      }
    }
  };
  </script>
  
  <style scoped>
  .movie-form-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }
  
  .form-header {
    text-align: center;
    margin-bottom: 20px;
  }
  
  h1 {
    font-size: 2.5rem;
    color: #333;
  }
  
  .form-group {
    margin-bottom: 20px;
  }
  
  label {
    display: block;
    font-size: 1.1rem;
    color: #555;
    margin-bottom: 5px;
  }
  
  .form-input {
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: border-color 0.3s ease;
  }
  
  .form-input:focus {
    border-color: #4a90e2;
    outline: none;
  }
  
  .textarea {
    min-height: 120px;
  }
  
  .submit-button {
    display: block;
    width: 100%;
    padding: 12px;
    background-color: #4a90e2;
    color: white;
    font-size: 1.1rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  
  .submit-button:hover {
    background-color: #357abd;
  }
  
  .submit-button:active {
    background-color: #2d6da5;
  }
  </style>
  