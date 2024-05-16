import { NavLink } from "react-router-dom";

export default function Page({ children }) {
  return (
    <>
      <header>
        <ul className="flex justify-center gap-x-5 py-5">
          <li>
            <NavLink to={'/'} className='navs'>
              Home
            </NavLink>
          </li>
          <li>
            <NavLink to={'/faqs'} className='navs'>
              Frequently asked questions
            </NavLink>
          </li>
          <li>
            <NavLink to={'/theme'} className='navs'>
              Theme boilerplate generator
            </NavLink></li>
          <li>
            <NavLink to={'/plugin'} className='navs'>
              Plugin boilerplate generator
            </NavLink>
          </li>
        </ul>
      </header>
      <div className="container mx-auto px-5">{children}</div>
    </>
  )
}