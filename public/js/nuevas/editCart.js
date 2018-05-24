$(".add-to-cart").click(function(event){
    event.preventDefault();
    var name = $(this).attr("data-name");
    var price = Number($(this).attr("data-price"));
    var id = $(this).attr("data-id");
    var categoria = $(this).attr("data-categoria");

    shoppingCart.addItemToCart(name, price, 1, id, categoria);
    displayCart();
});

$("#clear-cart").click(function(event){
    shoppingCart.clearCart();
    displayCart();
});

function displayCart() {
    var cartArray = shoppingCart.listCart();
    // console.log(cartArray);
    var output = "";

    for (var i in cartArray) {
        output += "<li>"
            +"<h5>"
            +cartArray[i].name + "</h3>"
            +" <input class='item-count ' type='number' data-name='"
            +cartArray[i].name
            +"' value='"+cartArray[i].count+"' >"
            +" x "+cartArray[i].price
            +" = "+cartArray[i].total
            +" <a class='plus-item btn-floating btn-small waves-effect waves-light red' data-name='"
            +cartArray[i].name+"'><i class='material-icons'>add_circle</i></a>"
            +" <a class='subtract-item btn-floating btn-small waves-effect waves-light red' data-name='"
            +cartArray[i].name+"'><i class='material-icons'>do_not_disturb_on</i></a>"
            +" <a class='delete-item btn-floating btn-small waves-effect waves-light red' data-name='"
            +cartArray[i].name+"'><i class='material-icons'>cancel</i></a>"
            +"</li>";
    }

    $("#show-cart").html(output);
    $("#count-cart").html( shoppingCart.countCart() );
    $("#total-cart").html( shoppingCart.totalCart() );
}

$("#show-cart").on("click", ".delete-item", function(event){
    var name = $(this).attr("data-name");
    shoppingCart.removeItemFromCartAll(name);
    displayCart();
});

$("#show-cart").on("click", ".subtract-item", function(event){
    var name = $(this).attr("data-name");
    shoppingCart.removeItemFromCart(name);
    displayCart();
});

$("#show-cart").on("click", ".plus-item", function(event){
    var name = $(this).attr("data-name");
    shoppingCart.addItemToCart(name, 0, 1);
    displayCart();
});

$("#show-cart").on("change", ".item-count", function(event){
    var name = $(this).attr("data-name");
    var count = Number($(this).val());
    shoppingCart.setCountForItem(name, count);
    displayCart();
});


displayCart();

$('#prueba').click(() => {
    var cartArray = shoppingCart.listCart();
    console.log(cartArray)
    shoppingCart.clearCart();
    var html_button="<form id='compra' method='post' action='/pagos/compra'>\
        <input name='_token' type='hidden'  value='" + $('#token').val() + "'>\
        <input name='productos' type='hidden'  value='" + JSON.stringify(cartArray) + "'>\
        </form>";
    $("#contenidoCompra").append(html_button);
    $("#compra").submit();
    
})