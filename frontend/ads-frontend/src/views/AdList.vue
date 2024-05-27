<template>
    <div class="container mt-4">
        <h1 class="mb-5">Main</h1>
        <div v-for="ad in ads" :key="ad.id" class="ad-card">
            <router-link :to="{ name: 'AdDetail', params: { id: ad.id } }">
                <div class="d-flex justify-content-between">
                    <p class="ad-title">{{ ad.title }}</p>
                    <p class="ad-price">{{ ad.price }}</p>
                </div>
                <img :src="getMainPhoto(ad.photos)" alt="Main Photo" />
            </router-link>
        </div>
        <nav>
            <ul class="pagination">
                <li v-for="pageNumber in totalPages" :key="pageNumber">
                    <a class="page-link" @click.prevent="fetchAds(pageNumber)" href="#">{{ pageNumber }}</a>
                </li>
            </ul>
        </nav>
    </div>
</template>
  
<script>
import api from '../services/api';
  
export default {
    data() {
        return {
            ads: [],
            currentPage: 1,
            totalPages: 1
        };
    },
    created() {
        this.fetchAds();
    },
    methods: {
        fetchAds(page = 1) {
            api.getAds(page).then(response => {
                this.ads = response.data.data;
                this.totalPages = response.data.last_page;
                console.log(response)
            });
        },
        getMainPhoto(photos) {
            const photosArray = JSON.parse(photos);
            const firstPhoto = photosArray[0];
            return firstPhoto;
        }
    }
};
</script>

<style>
    .ad-card {
        border: 1px solid #070707;
        padding: 30px;

        margin-bottom: 50px;
    }
    
    .ad-card a {
        color: black;
        text-decoration: none;
    }

    .ad-card a:hover {
        text-decoration: none;
    }

    .ad-card img {
        max-width: 100%;
        height: auto;
        border-radius: 1em;
    }

    .ad-title {
        font-size: 20px;
        font-weight: 500;
    }

    .ad-price {
        font-size: 20px;
    }
</style>