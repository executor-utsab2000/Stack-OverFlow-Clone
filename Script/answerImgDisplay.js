const ansImg = document.querySelectorAll(".ansImg > img");
const imgBig = document.querySelector("#imgBig");
const imgBigDisplay = document.querySelector(".imgBigDisplay");

ansImg.forEach((elm) => {
  elm.addEventListener("click", () => {
    const imgSrc = elm.getAttribute("src");
    console.log(imgSrc);

    imgBig.setAttribute("src", imgSrc);
    console.log(imgBigDisplay);
    imgBigDisplay.classList.remove("d-none");
  });
});
