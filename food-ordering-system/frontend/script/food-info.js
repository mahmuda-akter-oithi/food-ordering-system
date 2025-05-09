var food_id, food, restaurant;

async function food_info() {
    food_id = GET()['id'];
    food = await fetchJSON("../api/common/view-food.php?food_id=" + food_id);
    restaurant = await fetchJSON("../api/common/restaurant-profile.php?restaurant_id=" + food['restaurant_id'])

    output("food_name", food['name']);
    output("food_price", food['price']);
    output("restaurant_name", restaurant['name']);
    output("description", food['description']);
    $("#food_img").src = food['photo_link'];
    $("#restaurant_name").href = "./restaurant.html?id="+restaurant['id'];
}

async function orderFood() {
    let login_state, quantity, address, phone, data;

    login_state = await customer_login_check();
    if (login_state == false)
        await goTo('./customer/login.html');
    else {
        quantity = $("#quantity").value;
        address = prompt("Enter your address: ");
        phone = prompt("Enter your phone number: ");

        if ((address) && (phone)) {
            data = { 'food_id': food_id, 'quantity': quantity, 'address': address, 'phone': phone };
            alert(await post("../api/customer/order-food.php", data));
            await goTo('./index.html');
        }
        else
            alert("Address and phone number is required!");

    }
}

food_info();