const inputs = document.querySelectorAll(".input");
const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");

function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}

inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});

//show sidebar
menuBtn.addEventListener('click' , () => {
	sideMenu.style.display = 'block';
})

//close sidebar
closeBtn.addEventListener('click' , () => {
	sideMenu.style.display = 'none	'
})


//shows current date
function displayTimeAndDateInWords() {
  var today = new Date();
  var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
  var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  var dateInWords = days[today.getDay()] + ', ' + months[today.getMonth()] + ' ' + today.getDate() + ', ' + today.getFullYear();
  var hours = today.getHours();
  var minutes = today.getMinutes();
  var ampm = hours >= 12 ? 'PM' : 'AM';
  hours = hours % 12;
  hours = hours ? hours : 12; 
  minutes = minutes < 10 ? '0' + minutes : minutes;
  var timeInWords = hours + ':' + minutes + ' ' + ampm;
  document.getElementById('time-date').innerHTML =  ' ' + dateInWords + ' , ' + timeInWords ;
}



//change theme from light to dark
themeToggler.addEventListener('click' , () => {
	document.body.classList.toggle('dark-theme-variables'); 

	themeToggler.querySelector('i:nth-child(1)').classList.toggle('active');
	themeToggler.querySelector('i:nth-child(2)').classList.toggle('active');
})

//fills order in the table
// Updates.forEach(updates => {
// 	const tr = document.createElement('tr');
// 	const trContent = `
// 											<td>${updates.barangayName}</td>
// 											<td>${updates.collectionDate}</td>
// 											<td>${updates.time}</td>
// 											<td class="${updates.status === 'Failed' ? 'failed' : updates.status === 'Collected' ? 'success' : 'pending'}">${updates.status}</td>
// 											<td> <a href="#" class="edit-btn">Edit</td>
// 											<td> <a href="#" class="delete-btn">Delete</td>
// 											`
// 											//lagay mo na php file mo sa placeholder
// 	tr.innerHTML = trContent;
// 	document.querySelector('table tbody').appendChild(tr);
// })


