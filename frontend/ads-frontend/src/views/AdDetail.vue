<template>
    <div class="container mt-4">
        <div class="d-flex justify-content-between">
            <p class="ad-title">{{ ad.title }}</p>
            <p class="ad-price">{{ ad.price }}</p>
        </div>
        <p>{{ ad.description }}</p>
        <div v-for="photo in ad.photos" :key="photo">
            <img :src="photo" alt="Photo" />
        </div>
    </div>
</template>
  
<script>
import api from '../services/api';
  
export default {
    data() {
        return {
            ad: {}
        };
    },
    created() {
        const id = this.$route.params.id;
        api.getAd(id, { fields: 'description,photos' }).then(response => {
            this.ad = response.data;
        });
    }
};
</script>

<style scoped>
    img {
        width: 100%;
    }
</style>