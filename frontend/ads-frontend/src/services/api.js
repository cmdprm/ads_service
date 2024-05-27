import axios from 'axios';

const apiClient = axios.create({
    baseURL: 'http://localhost:8000/api',
    withCredentials: false,
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json'
    }
});

export default {
    getAds(page) {
        return apiClient.get('/ads?page=' + page);
    },
    getAd(id, params) {
        return apiClient.get(`/ads/${id}`, { params });
    },
    createAd(ad) {
        return apiClient.post('/ads', ad);
    }
};