////////////////////////////////////////////////////////////////////////////////////////
//                                                                                    //
//                          DATA Tables INITIALIZATION                               //
//                                                                                  //
//////////////////////////////////////////////////////////////////////////////////////

$(".submit").click(function(){
    form_id = $(this).attr('form');
    ref = main.validateForm(form_id);
    module = $("#"+form_id).attr('action');
    if (ref) {
        console.log(module);
        msg = $("#"+form_id).attr('msg');
        err_msg = $("#"+form_id).attr('err-msg');
        status = $("#"+form_id).attr('status');
        inputs = main.getInputs(form_id);
        main.create(inputs , module , msg , err_msg);
        if (main.isset(params.counter)) {
            params.counter = 0;
        }
         
  }
});
$(".submit-update").click(function(){
    form_id = $(this).attr('form');
    ref = main.validateForm(form_id);
    module = $("#"+form_id).attr('action');

    if (ref) {
        msg = $("#"+form_id).attr('msg');
        err_msg = $("#"+form_id).attr('err-msg');
        status = $("#"+form_id).attr('status');
        inputs = main.getInputs(form_id);
        main.update(inputs , module , msg , err_msg);
    }
});
$(".submit-delete").click(function() {
    id = DT.viewed_element;
    form_id = $(this).attr('form');
    main.delete(id);
    main.formReset(form_id);
});
$(".submit-new").click(function() {
    form_id = $(this).attr('form');
    main.formReset(form_id);
    $(".submit").removeClass('hidden');
    $(".submit-delete,.submit-update,.submit-new").addClass('hidden');
});
$(".add").click(function(){
    module = $(this).attr('module');
    content = main.add(module);
});
$("#quantity").keyup(function(event) {
    item_code = $("#item_code").val();
    item_price = $("#items-list option[value='"+item_code+"']").attr('price');
    console.log(item_price);
    item_quantity = $("#items-list option[value='"+item_code+"']").attr('quantity');
    requested_quantity = $(this).val();
    all_units = params.calculate.units;
    unit_id = $("#units").val();
    quantity = requested_quantity ;
    if (all_units[unit_id].type == "main") {
        for( prop in all_units ){
            if (prop != unit_id) {
                quantity *= all_units[prop]["main-quantity"];
            }
        }
    }
    else{
        for( prop in all_units ){
            if (all_units[prop].sub_id > all_units[unit_id].sub_id && all_units[prop].type == "sub") {
                quantity *= all_units[prop]["main-quantity"];
            }
        }
    }
    price = item_price*quantity;
    params.quantity = quantity;
    $("#price").val(price);

    if (quantity > item_quantity) {
        alert("لا توجد كمية مناسبة:"+item_quantity+"/"+quantity);
    }
});
$(".add-bill").click(function(event) {
    item_val = $("#item_code").val();
    item = $("#items-list option[value='"+item_val+"']").text();
    unit = $("#units").val();
    unit_text = $("#units option[value='"+unit+"']").text();
    quantity = $("#quantity").val();
    price = $("#price").val();
    if (main.isset(item_val) && !main.isEmpty(item_val) && main.isset(unit) && !main.isEmpty(unit) && main.isset(quantity) && !main.isEmpty(quantity) && main.isset(price) && !main.isEmpty(price)) {
        params.counter ++;
        form = "<div class=' new-row new-row-"+params.counter+"'>"+
        "<input type=\"hidden\" class=\" input \" name=\"item-"+params.counter+"\"  value=\""+item_val+"\">"+
        "<input type=\"hidden\" class=\" input \" name=\"unit-"+params.counter+"\" value=\""+unit+"\">"+
        "<input type=\"hidden\" class=\" input \" name=\"quantity-"+params.counter+"\" value=\""+params.quantity+"\">"+
        "<input type=\"hidden\" class=\" input \" name=\"price-"+params.counter+"\" value=\""+price+"\">"+
        "</div>";
        tr = "<tr class='new-row new-row-"+params.counter+"'><td style=\"text-align: right;\">"+item+"</td><td style=\"text-align: right;\">"+unit_text+"</td><td style=\"text-align: right;\">"+quantity+"</td><td style=\"text-align: right;\">"+price+"</td><td style=\"text-align: right;\"></td><td><i class='btn btn-info fa fa-remove remove-new-row' remove='"+params.counter+"' ></td></tr>";
        $("#selling-bill tbody").append(tr);
        $("#form").append(form);
        $("#item_code,#units,#quantity,#price").val("");
    }
    $(".remove-new-row").click(function(event) {
        remove = $(this).attr('remove');
        $(".new-row-"+remove).remove();
    });
    total = $("#total-price").text();
    total = Number(price)+Number(total);
    $("#total-price").text(total);
});

params.counter = 0;
main.init();