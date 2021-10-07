import { instace, responseBody } from "./settingAxios";

const Request = {
    getStartupsByUser : async (url, id) => await instace.get(url+"/"+id).then(responseBody)
}

export const StartUpRequest = {
    getStartupsByUser : async (id)=> await Request.getStartupsByUser("startups", id)
}