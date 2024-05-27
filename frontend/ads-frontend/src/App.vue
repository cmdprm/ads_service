<template>
    <div id="app">
        <nav class="container mt-5">
            <router-link to="/">Main</router-link>
            <router-link to="/create">Create</router-link>
        </nav>
        <router-view />
    </div>
</template>

<script>
export default {
    name: 'App',
};
</script>

<style>
    nav {
        font-size: 24px;
        font-weight: 400;
    }

    nav a {
        color: black;
        text-decoration: none;
        margin-right: 20px;
    }

    nav a:hover {
        color: black;
    }
</style>