function show_result_questions(str_query, page_number) {
    var question_list = document.querySelector("#question-selection");

    if(str_query.length == 0) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange=function() {
            if(this.readyState == 4 && this.status == 200) {
                document.open();
                document.write(this.responseText);
                document.close();
            }
        }
        xhr.open("GET", "./index.php?page=question_management&page_number=" + page_number, true);
        xhr.send();
    }
    else {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange=function() {
            if(this.readyState == 4 && this.status == 200) {
                question_list.innerHTML = this.responseText;
            }
        }
        xhr.open("GET", "../logical/live_search_questions.php?question_search=" + encodeURIComponent(str_query), true);
        xhr.send();
    }
}   