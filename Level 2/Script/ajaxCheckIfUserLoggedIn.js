import { sessionUserAuth } from "./Components/sessionUserAuth.js";
// ask a question btn

$(document).ready(function () {
  const askQuestionBtn = document.getElementById("askQuestionBtn");
  console.log(askQuestionBtn);

  askQuestionBtn.addEventListener("click", () => {
    sessionUserAuth("./questionAdd.php");
  });
});





// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------





$(document).ready(function () {
  const insertAnswer = document.getElementById("insertAnswer");
  console.log(insertAnswer);

  insertAnswer.addEventListener("click", () => {
    const questionId = insertAnswer.previousElementSibling.value;
    // console.log(questionId);
    sessionUserAuth(`./insertAnswer.php?questionId=${questionId}`);
  });
});

// to get data from object  parse is needed
