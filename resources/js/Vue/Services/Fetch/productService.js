import {API_URL} from "./fetch";

export const fetchProducts = () => {
    return fetch(API_URL + '/products', {
        headers: {
            'Accept': 'application/json'
        }
    })
        .then(data => data.json());
};

const productService = {
    getAll()
    {
        return fetchProducts();
    },
    remove(id)
    {
        return fetch(API_URL + '/products/' + id, {
            method: 'DELETE'
        });
    }
};

export default productService;
