function cart(id) {
    event.preventDefault()
    var qty = 1;
    $.ajax({
        type: 'get',
        url: urlUser,
        data: {
            id: id
        },
        typeData: 'json',
        success: function (data) {
            var html = '';
            for (var count = 0; count < data.length; count++) {
                html += `
                <tr id="item_` + data[count].id + `">
                    <input id="itemId_` + data[count].id + `" type="hidden" name="total[]" value="` + data[count].id + `" />
                    <td>
                    ` + data[count].name + `
                    </td>
                    <td>
                    ` + data[count].email + `
                    </td>
                    <td class="align-center">
                    <input class="form-control align-middle" name="total[]" id="totalId_` + data[count].id + `" value="` + qty + `" />
                    </td>
                    <td style="text-align:center">
                        <a href="#" onclick="deleter(` + data[count].id + `)"><i class="fa fa-trash"></i></th></a>
                    </td>
                </tr
            `;
            }
            var itemId = $("#itemId_" + id).val();
            var totalItem = +$("#totalId_" + id).val() + 1;

            if (itemId == id) {
                $("#totalId_" + id).val(totalItem);
            } else {
                $('.sale_cart tbody').append(html);
            }
        }
    });
}

function deleter(id) {
    event.preventDefault()
    var yes = confirm("Yakin mengapus data ini");
    if (yes) {
        $("#item_" + id).remove();
    }

}