import fetchApi, { API_URL } from "./fetch";

const configService = {
    getAll()
    {
        return fetchApi(API_URL + '/configs');
    },
    update({host, pass, port, user, secure})
    {
        const data = {
            host,
            pass,
            port,
            user,
            secure
        }

        return fetchApi(API_URL + '/configs', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });
    }
};

export default configService;
