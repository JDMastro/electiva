import { instace, responseBody } from "./settingAxios";

const Request = {
    getKindstartup : async (url) => await instace.get(url).then(responseBody)
}

export const KindStartupRequest = {
    getKindstartup : async ()=> await Request.getKindstartup("kindstartups")
}