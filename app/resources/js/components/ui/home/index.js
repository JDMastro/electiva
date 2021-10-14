import React from 'react';
import { Cards } from "./cards";
import { Link } from "react-router-dom";

export function Home({ startups }) {

    

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