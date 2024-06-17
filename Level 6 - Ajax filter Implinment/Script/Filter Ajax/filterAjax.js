const backendUrl = "Backend/Filter by Ajax/ajaxFilter.php";

//--------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------

const topic = document.querySelectorAll(".topic");
// console.log(topic);

function createObjectJson() {
  const objectData = {};
  topic.forEach((elm) => {
    const val = elm.getAttribute("value");
    const parameter = elm.getAttribute("name");

    if (elm.checked) {
      objectData[parameter] = val;
    }
  });
  return objectData;
}

topic.forEach((elm) => {
  elm.addEventListener("click", () => {
    const selectedFilter = createObjectJson();
    $.post(backendUrl, selectedFilter, function (data, status) {
      console.log(data);
      document.querySelector("#filteredSectionQuestion").innerHTML = data;
    });
    // console.log(selectedFilter);
  });
});

//--------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------

// document.querySelector("#filterClearBtn").addEventListener("click", () => {
//   topic.forEach((elm) => {
//     elm.checked = false;
//   });
// });
