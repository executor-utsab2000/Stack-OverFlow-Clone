$(document).ready(function () {
  $(".notificationButton").click(function () {
    $(".notificationBox").slideToggle("slow");
  });
});

// ------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------

const fetchNotification = () => {
  $.get("./fetchNotificationAdmin.back.php", function (data, status) {
    document.querySelector(".notifiicationContent").innerHTML = data;
    attachEventListners();
  });
};

// ------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------

const attachEventListners = () => {
  const notificationTab = document.querySelectorAll(".notificationTab");

  notificationTab.forEach((elm) => {
    elm.addEventListener("click", () => {
      elm.style.left = "-50px";

      // topic accept
      elm.children[1].children[0].addEventListener("click", () => {
        const reqToAdminId = elm.children[0].children[0].value;
        const topicName = elm.children[0].children[1].value;

        location.href = `./topicAdd.php?topicName=${topicName}&reqToAdminId=${reqToAdminId}`;
      });

      // delete btn
      elm.children[1].children[1].addEventListener("click", () => {
        $.post(
          "./admin.back.delete.topicRequest.php",
          {
            reqToAdminId: elm.children[0].children[0].value,
          },
          function (data, status) {
            console.log(data);
            if (data == "Data deleted") {
              elm.classList.add("animate__animated", "animate__zoomOut");
              fetchNotification();
              return;
            }
          }
        );
      });
    });
  });
};

fetchNotification();
