<script type="text/javascript">
    var totalcost_on_hand = 0;
    var inventory_total = 0;
    function iterateResults(selector, results){
        var ul = document.createElement('ul');
        ul.setAttribute('id', 'searchList');

        var resultHeader = document.createElement('h4');
        var headerText = document.createTextNode("Results:");     // Create a text node
        resultHeader.appendChild(headerText);


        document.getElementById(selector).appendChild(resultHeader);
        document.getElementById(selector).appendChild(ul);
        if(results.hasOwnProperty('results'))        results['results'].forEach(renderList);


        //[ {"id":"10", "class": "child-of-9"}, {"id":"11", "classd": "child-of-10"}];
        function renderList(element, index, arr) {
            //console.log( 'index / key: ' + index);
            if(element.hasOwnProperty('name') && element.hasOwnProperty('upc')){
                var li = document.createElement('li');
                li.setAttribute('class','item');

                ul.appendChild(li);


                if(element.hasOwnProperty('name') && element.hasOwnProperty('upc')){
                    li.innerHTML=li.innerHTML + "<a href=\"#\" id=\"search_result_item\" data-id=\"" +
                    index + "\" data-wineid=\"" +
                    element['id'] + "\"><b>Name:</b> " + element['name'] + " &nbsp; <b>UPC:</b> " + element['upc'] + "</a>";

                    li.lastChild.addEventListener('click', liClick);
                }

            }
        }
    }

    function liClick(){
        var itemid = $(this).attr("data-id");

        var wineid = $(this).attr("data-wineid");

        // Retrieve the object from storage
        var retrievedObject =  JSON.parse( localStorage.getItem('searchResults') );

        var ul = document.getElementById('inventory_locations_list');
        ul.innerHTML = '';
        inventory_total = 0;
        totalcost_on_hand = 0;


        console.log(retrievedObject[itemid]);

        retrievedObject.forEach(function(item) {
            //etc
            if(item.hasOwnProperty('id')) {
                //console.log("Found it", item['id']);
                if(item['id'] == wineid){
                    constructDiv(item);
                    //return;
                }
            }
        });

        //console.log('retrievedObject: ', JSON.parse(retrievedObject));
    }


    function constructDiv(item){

        console.log(item);

        if(item.hasOwnProperty('0')) item = item[0];

        if(item.hasOwnProperty('id'))   document.getElementById("wine_id").value = item['id'];
        if(item.hasOwnProperty('name')) /*console.log("WTF!!!"  + item['name']);*/ document.getElementById("name").innerHTML = item['name'];

        if(item.hasOwnProperty('quantity') && item.hasOwnProperty('location')){
            var ul = document.getElementById('inventory_locations_list');
            var li = document.createElement('li');
            li.setAttribute('class','inventory_location_item');
            ul.appendChild(li);

            li.innerHTML=li.innerHTML + "<strong>" + item['location'] + "</strong>" + " : " + item['quantity'];
            inventory_total = parseFloat(inventory_total) + parseFloat(item['quantity']);
            document.getElementById("inventory").innerText = "";
            document.getElementById("inventory").innerHTML = "Total inventory : " + inventory_total;
        }

        if(item.hasOwnProperty('cost')) document.getElementById("cost").innerHTML = item['cost'];
        if(item.hasOwnProperty('cost')) document.getElementById("cost_on_hand").innerHTML = "$" + (item['cost'] * inventory_total);
        if(item.hasOwnProperty('regular_sell_price')) document.getElementById("selling_price").innerHTML = item['regular_sell_price'];
        document.getElementById("singleResult").style.display = "block";
        document.getElementById("searchList").style.display = "none";

        /*
         var li = document.createElement('li');
         li.setAttribute('class','item');

         ul.appendChild(li);


         if(element.hasOwnProperty('name') && element.hasOwnProperty('upc')){
         li.innerHTML=li.innerHTML + "<a href=\"#\" id=\"search_result_item\" data-id=\"" +
         index + "\" data-wineid=\"" +
         element['id'] + "\"><b>Name:</b> " + element['name'] + " &nbsp; <b>UPC:</b> " + element['upc'] + "</a>";

         li.lastChild.addEventListener('click', liClick);
         }
         */

    }



    function handleSearchResponse(data){
        console.log(data);
        if( $.isEmptyObject(data.error) ) {
            //JSON has more than one response
            if ( Object.keys(data).length > 1 ) {
                document.getElementById('result').innerHTML = "";
                iterateResults('result', data);

                if(data.hasOwnProperty('locations'))
                {
                    handleLocations ( data['locations'] );
                }

                if(data.hasOwnProperty('results'))
                {
                    // Put the JSON object into storage
                    localStorage.setItem('searchResults', JSON.stringify(data['results']));
                }


            } else {
                //Only 1 response (the ideal situation)
                console.log("One reponse!");
                constructDiv(data);
            }
        }else{
            console.log( 'Error:', data);
        }

    }

    function select_list_success( selector, data, fields )
    {
        console.log("Selector we're using:" +  selector);
        if(fields) {
            console.log(fields);
        } else {
            return false;
        }
        //Clear Types Select Options
        $(selector).html(' ');
        $.each(data, function(i, value) {
            $(selector).append($('<option>').text(data[i][fields[0]]).attr('value', data[i][fields[1]]));
        });
    }

</script>