import React from 'react';

function Login() {
  return (
    <div className="col-12 col-sm-6">
      <div className="tasks-title">Login</div>
      <div className="col-6 mx-auto">
        <form action="#" method="post">
          <input
            type="email"
            name="email"
            placeholder="email"
            className="form-control my-4"
          />
          <input
            type="password"
            name="password"
            placeholder="password"
            className="form-control mb-4"
          />
          <button type="submit" name="btn" className="btn btn-primary btn-sm">
            Login
          </button>
        </form>
      </div>
    </div>
  );
}

export default Login;
