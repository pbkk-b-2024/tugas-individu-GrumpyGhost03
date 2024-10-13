<template>
    <div>
        <Header />
        <main class="movie-detail-container">
            <h1>{{ movie.title }}</h1>
            <p><strong>Description:</strong> {{ movie.description }}</p>
            <p><strong>Director:</strong> {{ movie.director }}</p>
            <p><strong>Release Date:</strong> {{ movie.release_date }}</p>
            <p><strong>Genre:</strong> {{ movie.genre }}</p>

            <router-link :to="`/movies/${movie.id}/edit`">Edit Movie</router-link>
        </main>
        <Footer />
    </div>
</template>

<script>
import Header from './header.vue';
import Footer from './footer.vue';

export default {
    props: {
        movie: Object
    },
    components: {
        Header,
        Footer
    }
};
</script>

<style scoped>
.movie-detail-container {
    max-width: 600px;
    margin: 2rem auto;
    padding: 1.5rem;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
</style>