const fetch = require('node-fetch');

const API_URL = 'http://127.0.0.1:8000/api';

const fetchProducts = () => {
    return fetch(API_URL + '/products')
        .then(res => res.json())
};

const addAlert = (product_id, price) => {
    const newAlert = {
        product_id,
        price
    };

    return fetch(API_URL + '/mails', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(newAlert)
    });
};

module.exports = {
    fetchProducts,
    addAlert
}
