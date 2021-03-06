export const HOST = 'http://127.0.0.1:8000';
export const API_URL = HOST + '/api';

const fetchApi = (url = API_URL, options = {}) => {
    return fetch(url, options).then(res => res.json());
};

export default fetchApi;
