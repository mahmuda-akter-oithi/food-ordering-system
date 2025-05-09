async function logout() {
  await fetch("../../api/common/logout.php");
  goTo("../");
}

async function loginCheck() {
  let login_state = await customer_login_check();
  if (login_state == false) goTo("./login.html");
}

function state_of_order(order_state) {
  switch (parseInt(order_state)) {
    case 0:
      return "Cancelled";
    case 1:
      return "Payment Pending";
    case 2:
      return "Processing";
    case 3:
      return "Delivered";
    default:
      return "Something went wrong";
  }
}

async function listOrders() {
  let container, myOrders;
  container = document.getElementById("myOrders");
  myOrders = await fetchJSON("../../api/customer/view-orders.php");
  myOrders.forEach((order, index) => {
    container.innerHTML +=
      "<tr>" +
      "<td>" +
      (index + 1) +
      "</td>" +
      "<td><a href='../food.html?id=" +
      order["food_id"] +
      "'><b>" +
      order["food_name"] +
      "</b></a></td>" +
      "<td>BDT " +
      order["rate"] +
      "</td>" +
      "<td>" +
      order["quantity"] +
      "</td>" +
      "<td>TK " +
      order["rate"] * order["quantity"] +
      "</td>" +
      "<td>" +
      order["address"] +
      "</td>" +
      "<td>" +
      order["phone"] +
      "</td>" +
      "<td>" +
      state_of_order(order["order_state"]) +
      "</td>" +
      "</tr>";
  });
}

async function main() {
  await loginCheck();
  await listOrders();
}

main();
