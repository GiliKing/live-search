// Start Of Code
$(document).ready(function() {
    // select the input tag add an event to check if a key is tapped
    $("#live_search").keyup(function() {
        let query = $(this).val();
        // check if the input query is not empty
        if(query != "" && query != "/" && query != "'" && query != '"') {
            // using the jquery ajax to post data asyn to the php file
            $.ajax({
                url: 'livesearch/functions.php', // containers our query logic
                method: 'POST',
                data : {
                    query: query
                },
                success: function(data) {
                    //display the live search 
                    $('#search_result').html(data);
                    $('#search_result').css('display', 'block');

                    
                    // $("#live_search").focusout(function () {
                    //     $('#search_result').css('display', 'none');
                    // });

                    // $("#live_search").focusin(function () {
                    //     $('#search_result').css('display', 'block');
                    // });
                }
            });
        }
    });
});

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