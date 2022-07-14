import React from 'react';
import {
  BrowserRouter,
  Routes,
  Route,
} from "react-router-dom";

import AuthPage from './components/AuthPage'
import TodosPage from './components/TodosPage'

function App() {
  return (
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<TodosPage />} />
          <Route path="/authenticate" element={<AuthPage />} />
        </Routes>
      </BrowserRouter>
    );
}

export default App;
