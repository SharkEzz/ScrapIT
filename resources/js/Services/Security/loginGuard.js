import loginService from "../Fetch/loginService";

const login = (email, password) => {
    return loginService.getCookie()
        .then(res => loginService.postLogin(email, password).then(res => res.status === 200));
};

export default login;
