async function showFoods(container, link) {
    let foods = await fetchJSON(link);
    let output = "";

    foods.forEach(food => {
        output +=
            '<a flat padding href="food.html?id=' + food['id'] + '">'
            + "<h3 no-margin>" + food['name'] + "</h3>"
            + '<img type="thumbnail" src=" ' + food['photo_link'] + '">  <br>'
            + "Price: TK " + food['price']
            + "<br><br> </a>"
            ;
    });

    $(container).innerHTML = output;
}