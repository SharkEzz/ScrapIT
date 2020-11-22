import loginService from "../Fetch/loginService";
import {API_URL} from "../Fetch/fetch";

const login = (email, password) => {
    return loginService.getCookie()
        .then(() => loginService.postLogin(email, password).then(res => res.data))
        .catch(err => {});
};

export const checkIfLoggedIn = () => {
    return window.axios.get(API_URL + '/user')
        .then(res => true)
        .catch(err => false);
};

export default login;
