import fetchScrapers from "./Fetch/fetchScrapers";
import {API_URL} from "./Fetch/fetch";

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