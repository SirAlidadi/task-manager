import React from 'react';

function Register() {
  return (
    <div className="col-12 col-sm-6 side">
      <div className="tasks-title">Register</div>
      <div className="col-6 mx-auto  register">
        <form action="#" method="post">
          <input
            type="text"
            name="name"
            placeholder="name"
            className="form-control my-4"
          />
          <input
            type="email"
            name="email"
            placeholder="email"
            className="form-control mb-4"
          />
          <input
            type="password"
            name="password"
            placeholder="password"
            className="form-control mb-4"
          />
          <button type="submit" name="btn" className="btn btn-primary btn-sm">
            Register
          </button>
        </form>
      </div>
    </div>
  );
}

export default Register;
