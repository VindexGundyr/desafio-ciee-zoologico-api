// Arquivo: resources/js/lib/apiClient.ts
import axios from 'axios';

const apiClient = axios.create({
  baseURL: '/api', 
                   
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
    'X-Requested-With': 'XMLHttpRequest', 
  },
  withCredentials: true, 
});

export default apiClient;