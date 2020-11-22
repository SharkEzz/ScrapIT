import { API_URL, HOST } from "./fetch";

const loginService = {
    getCookie()
    {
        return window.axios.get(HOST + '/sanctum/csrf-cookie');
    },
    postLogin(email, password)
    {
        return window.axios.post(API_URL + '/login', {
            email,
            password
        });
    },
    postLogout()
    {
        return window.axios.post(API_URL + '/logout');
    }
};

export default loginService;
