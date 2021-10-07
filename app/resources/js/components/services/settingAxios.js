import Axios from 'axios';

export const instace = Axios.create({
    baseURL : 'http://127.0.0.1:8000/api/',
    timeout : 15000,
})

export const responseBody = response => response.data;
