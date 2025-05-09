var restaurant_id = GET()['id'];

async function restaurant_info() {
    let restaurant = await fetchJSON("../api/common/restaurant-profile.php?restaurant_id=" + restaurant_id);
    output("restaurant_name", restaurant['name']);
    output("restaurant_email", restaurant['email']);
    output("restaurant_address", restaurant['address']);
    output("restaurant_description", restaurant['description']);
}

restaurant_info();

showFoods("#restaurant-foods","../api/common/restaurant-food.php?restaurant_id="+restaurant_id);
