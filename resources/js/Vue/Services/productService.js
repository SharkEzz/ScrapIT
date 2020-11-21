import fetchProducts from "./Fetch/fetchProducts";
import {API_URL} from "./Fetch/fetch";

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