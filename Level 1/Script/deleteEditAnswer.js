// ask a question btn

$(document).ready(function () {
  const deleteAnswer = document.getElementById("deleteAnswer");
  console.log(deleteAnswer);
  // console.log(deleteAnswer.parentElement.parentElement.firstElementChild.value);
  deleteAnswer.addEventListener("click", (e) => {
    $.post(
      "./Backend/Answer/deleteAnswer.php",
      {
        ansId: deleteAnswer.parentElement.parentElement.firstElementChild.value,
      },
      function (data, status) {
        console.log(data);
        history.go(0);
      }
    );
  });
});

// ---------


