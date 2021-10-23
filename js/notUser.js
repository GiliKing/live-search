
window.addEventListener('load', function() {
    let getOnLoad = JSON.parse(localStorage.getItem("search"));

    let history = document.getElementById("history");

    // checking if there no data in the local storage
        if(getOnLoad == null) {
            history.innerHTML = "You Currently Have No Search History";
        }

        // checking if there is data in the local storage
        if(getOnLoad != null) {

            let parsed = "";
            let show = "";
            let coll = "";
            for (let i = 0; i < getOnLoad.length; i++) {
                let changeValue = getOnLoad[i];
                parsed += "<small>" + "</small>" + changeValue.search + "<br>" + "<span>" + "</span>";
                show += "<small>" + "</small>" + changeValue.searchDate + "<br>" + "<span>" + "</span>";
                coll += "<small>" + "</small>" + changeValue.searchTime + "<br>" + "<span>" + "</span>";
            }

            document.getElementById('p1').innerHTML = parsed;
            document.getElementById('p2').innerHTML = coll;
            document.getElementById('p3').innerHTML = show;
            
        }
})

let btn = document.getElementById('onlyYou');

btn.addEventListener('click', function() {

    let askUser = confirm("Do you want to Clear All Search History")

    if(askUser == true) {
        // terminate the localStorage
        localStorage.removeItem("search")

        window.location.href = 'index.php';
    }
})