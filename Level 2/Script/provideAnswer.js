const answerSubmit = document.getElementById("answerSubmit");
// console.log(answerSubmit);

const inputs = answerSubmit.querySelectorAll(".inputs");
console.log(inputs);

answerSubmit.addEventListener("submit", (e) => {
  for (let i = 0; i < inputs.length; i++) {
    if (inputs[i].value.trim().length == 0) {
      e.preventDefault();
      //   console.log(inputs[i].parentElement.children[0].innerHTML);
      const alertxtQuestion = inputs[i].parentElement.children[0].innerHTML;
      alert("Enter " + alertxtQuestion);
      break;
    }
  }
});
