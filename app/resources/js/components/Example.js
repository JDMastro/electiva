import React from 'react';
import ReactDOM from 'react-dom';

import 'bootstrap/dist/css/bootstrap.min.css';
import { NavBar } from "./ui/navbar";

function Example({ user }) {
    return (
        <div className="container container-fluid">
            <NavBar user={user} />
            
        </div>
    );
}

export default Example;

if (document.getElementById('example')) {
    const el = document.getElementById('example')
    const props = Object.assign({}, el.dataset)
    const split = props.entityid.split("/")
    const user = JSON.parse(split)
    ReactDOM.render(<Example user={user} />, el);
}
/*

*/