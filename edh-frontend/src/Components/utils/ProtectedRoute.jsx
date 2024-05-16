import { Navigate, Outlet } from 'react-router-dom'

export function ProtectedRoute({canAccess, redirectTo}) {
  if (!canAccess) {
    return <Navigate to={redirectTo} replace />
  }
  return <Outlet />
}