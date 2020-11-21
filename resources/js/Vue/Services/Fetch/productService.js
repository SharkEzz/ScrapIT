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
    },
    add({name, description, price, scraper_id, url})
    {
        const newProduct = {
            name,
            description,
            price,
            scraper_id,
            url
        };

        return fetch(API_URL + '/products', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(newProduct)
        });
    }
};

export default productService;
