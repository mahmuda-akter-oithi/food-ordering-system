async function logout() {
    await fetch("../../api/common/logout.php");
    goTo("../");
}

async function loginCheck() {
    let login_state = await login_check();
    // console.log(login_state);
    if (login_state == false)
        goTo('./login.html');
}

function state_of_order(i) {
    switch (parseInt(i)) {
        case 0: return 'Cancelled';
        case 1: return 'Payment Pending';
        case 2: return 'Processing';
        case 3: return 'Delivered';
        default: return 'Something went wrong';
    }
}

async function updateStatus(order_id) {
    let state = prompt(
        `Enter 
        1 if payment is not done yet
        2 if payment recieved and is processing
        3 if order is delivered
        `
    );
    if (!(state > 0 && state <= 3))
        return alert("Invalid state")

    let data = { "order_id": order_id, "state": state };

    let result = await post(
        "../../api/restaurants/update-order.php",
        data);

    alert(result);
}

async function listOrders() {
    let container, myOrders;
    container = $('#myOrders');
    console.log(container);
    myOrders = await fetchJSON("../../api/restaurants/view-orders.php");
    myOrders.forEach((order, index) => {
        container.innerHTML += `<tr>
        <td>${index + 1}</td>
        <td><a href="../food.html?id=${order['food_id']}"><b>${order['food_name']}</b></a></td>
        <td>BDT ${order['rate']}</td>
        <td>${order['quantity']}</td>
        <td>TK ${order['rate'] * order['quantity']}</td>
        <td>  ${order['address']} </td>
        <td>  ${order['phone']} </td> 
        <td>${state_of_order(order['order_state'])}</td>
        <td>
        <button onclick="updateStatus(${order['id']})">Update status</button>
        </td>
        </tr>`
    });
}

async function main() {
    await loginCheck();
    await listOrders();
}

main();