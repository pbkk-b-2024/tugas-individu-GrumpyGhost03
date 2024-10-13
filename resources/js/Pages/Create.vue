<template>
    <div class="create-movie-container">
      <h1>Create a New Movie</h1>
      <form @submit.prevent="submitForm">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" id="title" v-model="form.title" required />
        </div>
  
        <div class="form-group">
          <label for="description">Description</label>
          <textarea id="description" v-model="form.description"></textarea>
        </div>
  
        <div class="form-group">
          <label for="director">Director</label>
          <input type="text" id="director" v-model="form.director" />
        </div>
  
        <div class="form-group">
          <label for="release_date">Release Date</label>
          <input type="date" id="release_date" v-model="form.release_date" />
        </div>
  
        <div class="form-group">
          <label for="genre">Genre</label>
          <input type="text" id="genre" v-model="form.genre" />
        </div>
  
        <div class="form-group">
          <button type="submit" class="submit-button">Create Movie</button>
        </div>
      </form>
    </div>
  </template>
  
  <script>
  import Header from './header.vue';
  import Footer from './footer.vue';
  import { Inertia } from '@inertiajs/inertia';
  import { ref } from 'vue';
  
  export default {
    name: 'CreateMovie',
    setup() {
      const form = ref({
        title: '',
        description: '',
        director: '',
        release_date: '',
        genre: '',
      });
  
      const submitForm = () => {
        Inertia.post('/movies', form.value, {
          onSuccess: () => {
            // Redirect or give feedback after successful creation
          },
        });
      };
  
      return {
        form,
        submitForm,
      };
    },
  };
  </script>
  
  <style scoped>
  .create-movie-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 2rem;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }
  
  h1 {
    text-align: center;
    color: #333;
  }
  
  .form-group {
    margin-bottom: 1.5rem;
  }
  
  label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: bold;
    color: #555;
  }
  
  input, textarea {
    width: 100%;
    padding: 0.8rem;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1rem;
  }
  
  textarea {
    resize: vertical;
  }
  
  .submit-button {
    display: block;
    width: 100%;
    padding: 0.8rem;
    background-color: #007bff;
    color: white;
    font-size: 1.2rem;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  
  .submit-button:hover {
    background-color: #0056b3;
  }
  </style>
  