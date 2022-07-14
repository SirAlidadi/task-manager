import React from 'react';

function InputTask() {
  return (
    <div className="w-100 pb-4">
      <input
        type="text"
        className="w-100"
        name="addTaskInput"
        id="addTaskInput"
        placeholder="add new task"
      />
    </div>
  );
}

export default InputTask;
