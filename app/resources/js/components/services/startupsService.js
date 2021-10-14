import { instace, responseBody } from "./settingAxios";

const Request = {
    getStartupsByUser: async (url, id) => await instace.get(url + "/" + id).then(responseBody),
    save: async (url, data) => await instace.post(url, data, {
        headers: {
            'Accept': 'Accept:application/json',
        }
    })
}

export const StartUpRequest = {
    getStartupsByUser: async (id) => await Request.getStartupsByUser("startups", id),
    save: async (data) => await Request.save("startups/store", data)
}