import axios from "axios";
import { useEffect, useState } from "react";
import { Link } from "react-router-dom";

export default function ListUser() {
  const [queues, setQueues] = useState([]);
  useEffect(() => {
    getQueues();
  }, []);

  function getQueues() {
    axios
      .get("http://localhost/projects101/api/queues/")
      .then(function (response) {
        console.log(response.data);
        setQueues(response.data);
      });
  }

  const deleteQueues = (id) => {
    axios
      .delete(`http://localhost/projects101/api/queue/${id}/delete`)
      .then(function (response) {
        console.log(response.data);
        getQueues();
      });
  };
  return (
    <div>
      <h1>List Queues</h1>
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Queue Number</th>
            <th>Department</th>
          </tr>
        </thead>
        <tbody>
          {queues.map((queue, key) => (
            <tr key={key}>
              <td>{queue.name}</td>
              <td>{queue.email}</td>
              <td>{queue.queu_no}</td>
              <td>{queue.dpt}</td>
              <td>
                <Link
                  to={`queue/${queue.id}/edit`}
                  style={{ marginRight: "10px" }}
                >
                  Edit
                </Link>
                <button onClick={() => deleteQueues(queue.id)}>Delete</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}
