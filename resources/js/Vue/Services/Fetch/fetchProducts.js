import {API_URL} from "./fetch";

const fetchProducts = () => {
    return fetch(API_URL + '/products', {
        headers: {
            'Accept': 'application/json'
        }
    })
        .then(data => data.json());
};

export default fetchProducts;