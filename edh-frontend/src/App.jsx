import './App.css'
import './tailwind.css'
import { BrowserRouter, Route, Routes } from "react-router-dom";
import FAQs from "./Pages/FAQs";
import Home from "./Pages/Home";
import Page from './Pages/Page';
import Theme from "./Pages/Theme";

function App() {

  return (
    <BrowserRouter>
      <Routes>
        <Route path='/' element={<Page><Home /></Page>} />
        <Route path='/faqs' element={<Page><FAQs /></Page>} />
        <Route path='/theme' element={<Page><Theme /></Page>} />
      </Routes>
    </BrowserRouter>
  )
}

export default App
