import loginService from "../Fetch/loginService";
import { store } from "../../store";

const logout = () => {
    return loginService.postLogout()
        .then(res => {
            if(res.status === 200)
            {
                store.commit('logout');
                return true;
            }
        });
}

export default logout;
