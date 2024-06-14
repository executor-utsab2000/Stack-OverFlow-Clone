import { sessionUserAuth } from "../Components/sessionUserAuth.js";

document.getElementById("currUrl").value = encodeURIComponent(location.href);
// console.log(encodeURIComponent( location.href));

const currUrlInput = document.querySelectorAll(".currUrl");
console.log(currUrlInput);
currUrlInput.forEach((elm) => (elm.value = location.href));

$(document).ready(function () {
  const saveAnswer = document.querySelector(".saveAnswer");
  console.log(saveAnswer);

  const questionId = document.getElementById("questionId").value;
  const answerId = document.getElementById("answerId").value;
  const currUrl = document.getElementById("currUrl").value;

  saveAnswer.addEventListener("click", () => {
    sessionUserAuth(
      `./Backend/Answer/answerBookMarked.back.php?answerId=${answerId}&questionId=${questionId}&currUrl=${currUrl}`
    );
  });
});

// replace the questions part by answer
