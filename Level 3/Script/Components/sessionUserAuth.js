export function sessionUserAuth(targetLocation) {
  const backendUrl = "./Backend/sessionUserAuth.php";

  $.get(backendUrl, function (data, status) {
    const datas = JSON.parse(data);
    // console.log(datas);
    if (datas.ifActive) {
      location.href = targetLocation;
    } else {
      location.href = "./index.php";
    }
  });
}

// export { sessionUserAuth };
