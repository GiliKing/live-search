const openBtn = document.querySelector(".js-open");
const modalBg = document.getElementsByTagName("div")[0];
const modalBox = document.getElementsByTagName("div")[1];


openBtn.addEventListener('click', function(event) {
    event.preventDefault()
    modalBg.classList.add("active")
    modalBox.classList.add("active")
})

const closeBtns = document.querySelectorAll(".js-close");

closeBtns.forEach(node => {
    node.addEventListener('click', function(e) {
        e.preventDefault()
        modalBg.classList.remove("active")
        modalBox.classList.remove("active")
    })
})


// get the date running so as to know at what specific time, day and year at which
// he or she started the search

// set interval for the date to keep on reoccurring

let date = new Date();

let hours = date.getHours(); // get the hour in number

// using an operator to display whether it is am or pm
const amPm = (hours >= 12)? "pm":"am";


//convert to 12 hours
// checking if it has exceed 12 the reduce it to 1 2 3... and so on 
if(hours > 12) {
    hours -= 12;
};

let hLength = hours.toString().length; // convert it to string

// display it with zero
if (hLength == 1) {
    hours = "0" + hours;
};


let mins = date.getMinutes(); // get the minutes in number
let mLength = mins.toString().length; // convert it to string
// display it with zero
if (mLength == '1') {
    mins = "0" + mins;
    };

let seconds = date.getSeconds(); // get the seconds in number
let sLength = seconds.toString().length; // convert it to string
// display it with zero
if (sLength == '1') {
    seconds = "0" + seconds;
};


// javascript only display days (0=6) with number so you need an array
let days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

let day = days[date.getDay()];

// javascript only display month (0-11) with number so you need an array
let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

let month = months[date.getMonth()];

let year = date.getFullYear();


clockValue = day + "/" + month +"/" + year;
clockTime = hours + ":" + mins  + amPm ;

const form = document.getElementById("form_method");

const username = document.getElementById("only_name").innerText;

const useremail = document.getElementById("only_email").innerText;



form.addEventListener("submit", function() {

    let search = this.live_search.value;

    let searchDate = clockValue;

    let searchTime = clockTime;

    if(search.length != 0 && username.length != 0 && useremail.length != 0) {
        // using the jquery ajax to post data asyn to the php file
        $.ajax({
            url: 'process/forms.php', // containers our query logic
            method: 'POST',
            data : {
                username: username,
                useremail: useremail,
                search: search,
                searchDate: searchDate,
                searchTime: searchTime
            },
            success: function(data) {
                console.log('ok');
            }
        });
    }
    
})
