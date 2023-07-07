$(document).ready(function() {
    $('#product').on('change', function() {
        var selectedValue = $(this).val();
        var parts = selectedValue.split("|");
        var product_id = parts[0];
        $("#product_id").val(product_id);
        var base_price = parseInt(parts[1]);
        $("#base_price").val(base_price);
        var sell_price = parseInt(parts[2]);
        $("#sell_price").val(sell_price);
        var stock = parts[3];
        $("#stock").val(stock);
        var name = parts[4];
        $("#product_name").val(name);

        var stocks = $("#stock").val()
        var qty = $("#qty").val()
        checkStock(qty, stocks)
        calculateTax($("#sell_price").val(), qty)
    });
    
    $("#qty").on('input', function() {
        var inputValue = $(this).val();
        var sanitizedValue = inputValue.replace(/[^0-9]/g, '');
        $(this).val(sanitizedValue);

        var stock = $("#stock").val()
        checkStock(inputValue, stock)
    });

    function checkStock(qty, stock){
        if(parseInt(qty)>parseInt(stock)){
            reset();
            alert("Stok tidak mencukupi, sisa stok adalah "+stock)
        }else{
            calculateTax($("#sell_price").val(), qty)
        }
    }
    
    function calculateTax(price, qty) {
        var taxableAmount = parseInt(price) * parseInt(qty)
        var taxAmount = taxableAmount * (11 / 100);
        var totalAmount = taxableAmount + taxAmount;

        $("#sub_total").val(taxableAmount);
        $("#tax").val(taxAmount);
        $("#total").val(totalAmount)
    }

    function reset(){
        $("#sub_total").val('');
        $("#tax").val('')
        $("#total").val('')
        $("#qty").val('')
    }
});