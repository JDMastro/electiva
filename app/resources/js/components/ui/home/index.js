import React, { useState, useEffect } from 'react';
import { Cards } from "./cards";
import { Link } from "react-router-dom";

import { StartUpRequest } from "../../services/startupsService";

export function Home({ user }) {

    const [startups, setstartups] = useState([])

    useEffect(() => {
        StartUpRequest.getStartupsByUser(user.id).then(e => {setstartups(e.data.data); console.log(e.data.data) })
       
    }, [])

    return (
        <div className="container container-fluid">
            {/*<Cards />*/}
            {
                <div className="row" >
                    {
                        startups.length > 0 ? (
                            startups.map((e, i) => 
                        <div className="col-lg-4 col-md-4 col-xs-6" key={i}>
                            <Cards startup={e} />
                        </div>
                     )
                        ) : (<div>you do not have startup, please create one <Link to="/startup" replace>Add startup</Link></div>)
                    }
                </div>

            }
        </div>
    );
}