import fetchApi, { API_URL } from "./fetch";

const alertService = {
    getAll()
    {
        return fetchApi(API_URL + '/mails');
    },
    remove(id)
    {
        return fetchApi(API_URL + '/mails/' + id, {
            method: 'DELETE'
        })
    }
};

export default alertService;
