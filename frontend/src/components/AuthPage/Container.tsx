import React from 'react';
import Login from './Login';
import Navbar from './Navbar';
import Register from './Register';

function Container() {
    return (
        <div className="container">
            <div className="col-12 mt-5">
                <div className="box w-100">
                    <Navbar />
                    <div className="container">
                        <div className="row">
                            <Register />
                            <Login />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Container;