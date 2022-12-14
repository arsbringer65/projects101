import { BrowserRouter, Routes, Route, Link } from "react-router-dom";
import "./App.css";
import CreateQueue from "./components/CreateQueue";
import EditQueue from "./components/EditQueue";
import ListQueue from "./components/ListQueue";

function App() {
  return (
    <div className="App">
      <h5>GCWP</h5>

      <BrowserRouter>
        <nav>
          <ul>
            <li>
              <Link to="/">Queues</Link>
            </li>
            <li>
              <Link to="queue/create">Create Queues</Link>
            </li>
          </ul>
        </nav>
        <Routes>
          <Route index element={<ListQueue />} />
          <Route path="queue/create" element={<CreateQueue />} />
          <Route path="queue/:id/edit" element={<EditQueue />} />
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
