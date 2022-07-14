import React from 'react';

function Todo() {
  return (
    <li className="task checked border-bottom border-top my-1">
      <i data-taskid="1" className="is-done bi-hand-thumbs-up-fill"></i>
      <span className="task-title mx-2">complete the project</span>
      <div className="info float-end">
        <a href="#" className="pull-right remove text-danger">
          <i className="bi bi-trash"></i>
        </a>
      </div>
      <div className="clearfix"></div>
    </li>
  );
}

export default Todo;
