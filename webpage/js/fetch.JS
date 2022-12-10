async function loadTable(url, table) {
  const tableBody = table.querySelector("tbody");
  const res = await fetch(url);
  const data = await res.json();

  console.log(data);

  tableBody.InnerHTML = "";

  for (const row of rows) {
    const rowElement = document.createElement("tr");

    for (const cellText of row) {
      const cellElement = document.createElement("td");
      cellElement.textContent = cellText;
      rowElement.appendChild(cellElement);
    }

    tableBody.appendChild(rowElement);
  }
}

loadTable(
  "http://localhost/projects101/reclher_api/schedule",
  document.querySelector("table")
);




// fetch("http://localhost/projects101/reclher_api/schedule")
//   .then((response) => response.json())
//   .then((data) => {
//     if (!Array.isArray(data)) {
//       data = Array.from(data);
//     }

//     console.log(data);

//     data.forEach((schedule) => {
//       const row = `
//       <td>${schedule.brgy}</td>
//       <td>${schedule.date}</td>
//       <td>${schedule.time}</td>
//       `;

//       document.querySelector("tbody").insertAdjacentHTML("beforend", row);
//     });
//   });
