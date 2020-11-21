import {API_URL} from "./fetch";

export const fetchScrapers = () => {
    return fetch(API_URL + '/scrapers', {
        headers: {
            'Accept': 'application/json'
        }
    }).then(data => data.json());
};

const scraperService = {
    getAll()
    {
        return fetchScrapers();
    },
    remove(id)
    {
        return fetch(API_URL + '/scrapers/' + id, {
            method: 'DELETE'
        });
    },
    add({name, description, blockName})
    {
        const data = {
            name,
            description,
            blockName
        };

        console.log(JSON.stringify(data));

        return fetch(API_URL + '/scrapers', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
    }
};

export default scraperService;
