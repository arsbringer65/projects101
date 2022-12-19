
import './App.css';
import {BrowserRouter, Routes, Route, Link} from "react-router-dom";
import Header from './components/Header';
import Main from './components/Main';
import Footer from './components/Footer';

function App() {
  return (
    <div class='App'>
      <Header />
      <Main />
      <Footer />
    </div>
  )
}

export default App;
