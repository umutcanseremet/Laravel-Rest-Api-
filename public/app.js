$(document).ready(function () {
    $.ajax({
        method: "get",
        url: "api/products",
        data: null,
        success: function (response) {
            $("div").text(JSON.stringify(response));
        }
    });
});

function store() {
    $("button[type=submit]").attr("disabled", true);
    $.ajax({
        method: "post",
        url: "api/products",
        data: $("#store").serialize(),
        success: function (response) {
            if (response.message = "Ürün Eklendi!") {
                alert('Ürün Eklendi.')
            }
            $("div").text(JSON.stringify(response));
            $("button[type=submit]").attr("disabled", false);
            $("form").trigger("reset");
        }
    });
}

function update() {
    let id = $("input[name=upd_product_id]").val();
    $("button[type=submit]").attr("disabled", true);
    $.ajax({
        type: "put",
        url: "api/products/" + id,
        data: $("#update").serialize(),
        success: function (response) {
            if (response.message = "Ürün Güncellendi!") {
                alert('Ürün Güncellendi!')
            }
            $("div").text(JSON.stringify(response));
            $("button[type=submit]").attr("disabled", false);
            $("form").trigger("reset");
        }
    });
}

function delete_product() {
    let id = $("input[name=del_product_id]").val();
    $("button[type=submit]").attr("disabled", true);
    $.ajax({
        method: "delete",
        url: "api/products/" + id,
        data: $("#delete").serialize(),
        success: function (response) {
            if (response.message = "Ürün Silindi!") {
                alert('Ürün Silindi!')
            }
            $("div").text(JSON.stringify(response));
            $("button[type=submit]").attr("disabled", false);
            $("form").trigger("reset");
        }
    });
}

function get_only() {
    let id = $("input[name=product_id]").val();
    $("button[type=submit]").attr("disabled", true);
    $.ajax({
        method: "get",
        url: "api/products/" + id,
        data: $("#get").serialize(),
        success: function (response) {
            $("div").text(JSON.stringify(response));
            $("button[type=submit]").attr("disabled", false);
            $("form").trigger("reset");
        }
    });
}
