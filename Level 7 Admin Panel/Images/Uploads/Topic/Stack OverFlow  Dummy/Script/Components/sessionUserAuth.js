

export function sessionUserAuth(location) {
  const backendUrl = "./Backend/sessionUserAuth.php";

  $.get(backendUrl, function (data, status) {
    const datas = JSON.parse(data);
    console.log(datas);
    if (dataObject.ifActive) {
      return;
    } else {
      location.href = location;
    }
  });
}
