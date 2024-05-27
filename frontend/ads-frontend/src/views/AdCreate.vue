<template>
    <div class="container mt-4">
        <h1 class="mb-5">Create</h1>
        <form @submit.prevent="createAd">
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" v-model="title" id="title" />
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea v-model="description" id="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="photos">Photos</label>
                <input type="text" v-model="photos" id="photos" />
            </div>
            <div class="mb-3">
                <label for="price">Price</label>
                <input type="number" v-model="price" id="price" />
            </div>
            <button type="submit" class="dark-button">Create</button>
        </form>
    </div>
</template>
  
<script>
import api from '../services/api';
  
export default {
    data() {
        return {
            title: '',
            description: '',
            photos: '',
            price: ''
        };
    },
    methods: {
        createAd() {
            const ad = {
                title: this.title,
                description: this.description,
                photos: this.photos.split(','),
                price: this.price
            };
            api.createAd(ad).then(response => {
                this.$router.push('/');
            });
        }
    }
};
</script>

<style scoped>
    form input, form select, form textarea {
        border: 0;
        padding: 10px 20px;
        border: 1px solid #eee;
        width: 100%;
    }

    form input:focus, form select:focus, form textarea:focus {
        border: 1px solid #0f0f0f;
        border-radius: 0;
        outline: none;
    }

    .dark-button {
        border: 0;
        background: #0f0f0f;
        color: white;
        text-transform: uppercase;
        font-size: 14px;
        font-weight: 500;
        padding: 14px 24px;
    }

    .dark-button:hover {
        background: #2c2c2c;
    }
</style>