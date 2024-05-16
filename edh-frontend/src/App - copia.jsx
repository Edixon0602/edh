import './App.css'
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import { Home } from './pages/Home';
import { Login } from './pages/Login';
import { ProtectedRoute } from './components/utils/ProtectedRoute.jsx';
import { useAuth } from './hooks/useAuth.jsx';
import { useEffect, useState } from 'react';

function App() {
  const token = window.localStorage.getItem('lg-token')
  return (
    <BrowserRouter>
      <div className='App'>
        <Routes>
          <Route element={<ProtectedRoute canAccess={useAuth(token)} redirectTo={'/login'} />}>
            <Route path='' element={<Home />} />
          </Route>
          <Route path='/login' element={<Login />} />
        </Routes>
      </div>
    </BrowserRouter>
  )
}

export default App
