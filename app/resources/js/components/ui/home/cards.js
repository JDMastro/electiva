import React from 'react';
import './home.css';

export function Cards({ startup }) {
    return (
        <div>
            <div className="card p-3 mb-2">
                <div className="d-flex justify-content-between">
                    <div className="d-flex flex-row align-items-center">
                        <div className="icon"> <img src={`http://127.0.0.1:8000/img/${startup.img}`} alt="..."
                            width="40px" height="40px" /> </div>
                        <div className="ms-2 c-details">
                            <h6 className="mb-0" style={{ fontSize : "1.1vw" }}>{startup.sname}</h6>
                        </div>
                    </div>
                    <div className="badge"> <span>{startup.kname}</span> </div>
                </div>
                <div className="">

                    <div className="mt-5">
                        <div className="progress">
                            <div className="progress-bar" role="progressbar" style={{width : `${startup.avg*100/5}%`}}
                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div className="row">
                            <div className="col-6">
                                <div className="mt-3"> <span className="text1">{(Math.round(startup.avg * 100) / 100).toFixed(1)}
                                     qualification <span className="text2">of 5 </span></span> </div>
                            </div>
                            <div className="col-6">
                                <div className="d-flex justify-content-center mt-1">
                                    <h3 className="heading"><a className="link-info" href="/#"
                                        style={{ fontSize : "1vw" }}>requests obtained ({startup.count})</a><br /></h3>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    );
}