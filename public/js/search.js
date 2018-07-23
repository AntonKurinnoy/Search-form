function search() {

    $("#loadPopup").show();

    var mass = {};

    var name = $('#Name').val();
    if (name !== "")
        mass['name'] = name;
    var bedrooms = $('#Bedrooms').val();
    if (bedrooms !== "")
        mass['bedrooms'] = bedrooms;
    var bathrooms = $('#Bathrooms').val();
    if (bathrooms !== "")
        mass['bathrooms'] = bathrooms;
    var storeys = $('#Storeys').val();
    if (storeys !== "")
        mass['storeys'] = storeys;
    var garages = $('#Garages').val();
    if (garages !== "")
        mass['garages'] = garages;
    var priceFrom = $('#PriceFrom').val();
    if (priceFrom !== "")
        mass['priceFrom'] = priceFrom;
    var priceTo = $('#PriceTo').val();
    if (priceTo !== "")
        mass['priceTo'] = priceTo;

    $('div[name="result"] table tbody').empty();
    $('div[name="form"] input').each(function (pos,el) {
        $(el).val('')
    });

    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: '/',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {'data': mass},
        success: function (result) {
            $("#loadPopup").hide();

            if (result.result !== "empty"){
                if (result.result.length > 0){
                    for (var n in result.result){
                        var line = '<tr><td>'+result.result[n]["Name"]+'</td>';
                        line = line+'<td>'+result.result[n]["Price"]+'</td>';
                        line = line+'<td>'+result.result[n]["Bedrooms"]+'</td>';
                        line = line+'<td>'+result.result[n]["Bathrooms"]+'</td>';
                        line = line+'<td>'+result.result[n]["Storeys"]+'</td>';
                        line = line+'<td>'+result.result[n]["Garages"]+'</td>';
                        line = line+'</tr>';
                        $('div[name="result"] table tbody').append(line);
                    }
                }else
                    alert('Nothing was found!');

            } else
                alert('Enter data!');
        }

    });

    return false;

}

