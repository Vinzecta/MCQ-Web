function show_result_quiz(str_query, page_number) {
    var tests_list = document.querySelector(".category-display");

    if(str_query.length == 0) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange=function() {
            if(this.readyState == 4 && this.status == 200) {
                document.open();
                document.write(this.responseText);
                document.close();
            }
        }
        xhr.open("GET", "./index.php?page=quiz&page_number=" + page_number, true);
        xhr.send();
    }
    else {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange=function() {
            if(this.readyState == 4 && this.status == 200) {
                tests_list.innerHTML = this.responseText;
            }
        }
        xhr.open("GET", "../logical/live_search_tests.php?test_search=" + encodeURIComponent(str_query), true);
        xhr.send();
    }
}   