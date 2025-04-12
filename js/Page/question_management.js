document.addEventListener("DOMContentLoaded", function() {
    const delete_question = document.querySelectorAll(".delete-question");

    delete_question.forEach(button => {
        button.addEventListener("click", function () {
          const questionDiv = this.closest(".questions");
          if (questionDiv) {
            questionDiv.remove();
          }
        });
      }); 
});