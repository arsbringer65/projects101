import { useState } from "react";
import axios from "axios";
import { useNavigate } from "react-router-dom";

export default function ListUser() {
  const navigate = useNavigate();

  const [inputs, setInputs] = useState([]);

  const handleChange = (event) => {
    const name = event.target.name;
    const value = event.target.value;
    setInputs((values) => ({ ...values, [name]: value }));
  };
  const handleSubmit = (event) => {
    event.preventDefault();

    axios
      .post("http://localhost/projects101/api/queues/save/", inputs)
      .then(function (response) {
        console.log(response.data);
        navigate("/");
      });
  };
  return (
    <div>
      <h1>Create Queue</h1>
      <form onSubmit={handleSubmit}>
        <table cellSpacing="10">
          <tbody>
            <tr>
              <th>
                <label>Name: </label>
              </th>
              <td>
                <input type="text" name="name" onChange={handleChange} />
              </td>
            </tr>
            <tr>
              <th>
                <label>Email: </label>
              </th>
              <td>
                <input type="text" name="email" onChange={handleChange} required/>
              </td>
            </tr>

            <tr>
              <td>
                <input type="hidden" name="queu_no" onChange={handleChange} required/>
              </td>
            </tr>

            <tr>
              <th>
                <label>Department: </label>
              </th>
              <td>
                <select name="dpt" id="dpt" onChange={handleChange} required>
                  <option >Please Choose where to Queue</option>
                  <option value="GC Clinic">GC CLINIC</option>
                  <option value="CO-OP">CO-OP</option>
                  <option value="REGISTRAR">REGISTRAR</option>
                </select>
              </td>
            </tr>

            <tr>
              <td colSpan="2" align="right">
                <button>Save</button>
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  );
}
