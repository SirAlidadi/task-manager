import React from 'react';
import InputTask from './InputTask';
import Navbar from './Navbar';
import Todo from './Todo';

function Container() {
  return (
    <div className="container">
      <div className="col-12 mt-5">
        <div className="box w-100">
            <Navbar />
          <div className="container">
            <div className="row">
              <div className="col-12 col-sm-12">
                <InputTask />
                <div className="tasks-title">My Tasks</div>
                <ul className="list-unstyled">
                    <Todo />
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Container;
