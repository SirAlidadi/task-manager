import React from 'react';

function Navbar() {
  return (
    <div className="custom-nav">
      <div className="title text-white">SpeedTodo</div>
      <div className="user">
        <a href="#" className="float-end text-white mt-2">
          <i className="bi bi-box-arrow-right"></i>
        </a>
        <span className="username float-end">Anonymous</span>
        <img
          src={require('./images/profile.png')}
          className="rounded float-end"
          width="40"
          height="40"
        />
      </div>
    </div>
  );
}

export default Navbar;
