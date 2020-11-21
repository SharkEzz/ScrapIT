import {API_URL} from "./fetch";

const fetchScrapers = () => {
    return fetch(API_URL + '/scrapers', {
        headers: {
            'Accept': 'application/json'
        }
    }).then(data => data.json());
};

export default fetchScrapers;