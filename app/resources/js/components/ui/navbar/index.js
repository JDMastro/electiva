import React, { useState, useEffect } from 'react';
import { HashRouter, Link, Route } from "react-router-dom";
import { Home } from "../home";
import { Requests } from "../requests";
import { Startups } from "../startsup";



import { StartUpRequest } from "../../services/startupsService";
import { KindStartupRequest } from "../../services/kindstartupService";

export function NavBar({ user }) {

    const [startups, setstartups] = useState([])
    const [kind, setkind] = useState([])


    useEffect(() => {
        StartUpRequest.getStartupsByUser(user.id).then(e => { setstartups(e.data.data) })
        KindStartupRequest.getKindstartup().then(e => { setkind(e) })


    }, [])



    return (
        <HashRouter>

            <div className="mt-3">
                <nav className="navbar navbar-expand-md navbar-light bg-white ">
                    <div className="container-fluid">
                        <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                            <span className="navbar-toggler-icon"></span>
                        </button>
                        <div className="collapse navbar-collapse" id="navbarScroll">
                            <ul className="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
                                <li className="nav-item">
                                    {/*<a class="nav-link active" aria-current="page" href="#">Home</a>*/}
                                    <Link to="/" className="nav-link active" replace>Home</Link>
                                </li>

                                <li className="nav-item">
                                    {/*<a class="nav-link" href="#">Add startup</a>*/}
                                    <Link to="/startup" className="nav-link" replace>Startup</Link>
                                </li>

                                <li className="nav-item">
                                    {/*<a class="nav-link" href="#">Requests</a>*/}
                                    <Link to="/request" className="nav-link" replace>Request</Link>
                                </li>
                            </ul>



                            <ul className="navbar-nav ml-auto my-2 my-lg-0 navbar-nav-scroll">
                                <li className="nav-item">
                                    <a className="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li className="nav-item">
                                    <a className="nav-link" href="#">Link</a>
                                </li>
                                <li className="nav-item dropdown">
                                    <a className="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Link
                                    </a>
                                    <ul className="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                        <li><a className="dropdown-item" href="#">Action</a></li>
                                        <li><a className="dropdown-item" href="#">Another action</a></li>
                                        <li><hr className="dropdown-divider" /></li>
                                        <li><a className="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            <div className="">
                <Route exact path="/" component={() => <Home startups={startups} />} />
                <Route exact path="/startup" component={() => <Startups kind={kind} user={user} />} />
                <Route exact path="/request" component={Requests} />
            </div>

        </HashRouter>
    );
}
