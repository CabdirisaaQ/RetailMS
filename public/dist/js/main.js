/*-------------------------------------------------------
- In the name of Allaah
- Author: CabdirisaaQ
- Date: March 28,2016
- Created for: Guul Alle Fuel Station & Supermarket
- Description : Retail Management System 
-------------------------------------------------------*/
$(document).ready(function() {

	// this line will test if the js file works
	console.log("In The Name Of ALLAAH");
	
    //this url is for development in laravel homestead
	var url = 'http://retailms.app:8000';
	
  	//this is url is for prodction "YOUR IP"
  	//var url = 'http://X.X.X.X';

	if ( document.getElementById("searchItem")) {
		//console.log('element exists');
		document.getElementById("searchItem").focus();
	};


	/*---------------------------------------------------
	//    the purchase order script
	-----------------------------------------------------*/
	// this function will retrive the product details
	$("#purchasedItem").blur(function () { // when the feild loses focus

	    // extract the product description from the feild
	    var description = $("#purchasedItem option:selected").text();

		$.get( url + '/admin/product/stock/'+ description, function( data ) {
			
			// upon request success fill in the following feilds
			$('#unitPrice-txt').val(data.unitPrice);
			$('#unitShelfPrice-txt').val(data.unitShelfPrice);
			$('#itemPrice-txt').val(data.itemPrice);
			$('#itemShelfPrice-txt').val(data.itemShelfPrice);

		});
	}); // end #purchasedItem.blur

	// calculate the total automatically
	$('#unitsInOrder-txt').blur(function () {
		// set #total-txt
		$('#total-txt').val($('#unitPrice-txt').val() * $('#unitsInOrder-txt').val());
	})

	// calculate the remaining / the credit
	$('#cash-txt').blur(function () {
		// set #total-txt
		$('#credit-txt').val($('#total-txt').val() - $('#cash-txt').val());
	});
	

	/*-----------------------------------------------------
	//		Sales window script
	-----------------------------------------------------*/
	
	// search item by barcode
	$('#searchItem').keypress(function(){
	    var barcode = $(this).val();
	   console.log(barcode);

	    $.get(url + '/sales/searchBarcode/' + barcode, function (data) {
	        console.log(data);
	        if (data === 'true') {
	        	 $("body").load('/');
	        } else {
	        	$("#searchItemResponse").text('Item not found');
	        }

	    }) 
	});

	//display modal form for task editing
	$('.item').click(function(){
	    var item_id = $(this).attr("data");
	  //  console.log(item_id);

	    $.get(url + '/sales/editItem/' + item_id, function (data) {
	       // console.log(data.qty);
	        //success data
	        $('#edit-unitPrice-txt').val(data.unitPrice);
	        if (data.qty == '0') {
	        	$('#edit-qty-txt').val(' ');
	        } else {
	        	$('#edit-qty-txt').val(data.qty);
	        };

	        $('#itemId').val(item_id);
	        $('#item-save-btn').val("update");
	       // $('form#editItem').attr('action',url + '/sales/editItem/' + item_id);

	        document.getElementById("edit-qty-txt").focus();
	        $('#myModal').modal('show');
	    }) 
	});

	//create new task / update existing task
	$("#item-save-btn").click(function (e) {
	    $.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
	        }
	    })

	    e.preventDefault(); 

	    var formData = {
	        unitPrice: $('#edit-unitPrice-txt').val(),
	        qty: $('#edit-qty-txt').val(),
	        //item_id: $('#itemId').val(),
	    }

	    //used to determine the http verb to use [add=POST], [update=PUT]
	    var state = $('#item-save-btn').val();

	    var type = "POST"; //for creating new resource
	    var item_id = $('#itemId').val();
	    var my_url = url + '/sales/editItem';

	    if (state == "update"){
	        type = "POST"; //for updating existing resource
	        my_url += '/' + item_id;
	    }

	   // console.log(formData);

	    $.ajax({

	        type: type,
	        url: my_url,
	        data: formData,
	        dataType: 'json',
	        success: function (data) {
	            //console.log(data);
		           var item = '<tr class="item" data="' + data.id + '"><td>' + data.item + '</td><td>' + data.unitPrice + '</td><td>' + data.qty + '</td><td>' + data.total + '</td></tr>';

	            	//updated an existing record

	                $(".item[data="+ item_id +"]").replaceWith( item );

	                $("body").load('/');

	            $('#editItem').trigger("reset");

	            $('#myModal').modal('hide')
	        },
	        error: function (data) {
	            console.log('Error:', data);
	        }
	    });
	});
	
	//delete task and remove it from list
	$('#item-delete-btn').click(function(e){
		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
	        }
	    })
	    e.preventDefault(); 

		var item_id = $('#itemId').val();
	    //console.log(item_id);
	    $.ajax({

	        type: "DELETE",
	        url: url + '/sales/deleteItem' + '/' + item_id,
	        success: function (data) {
	            //console.log(data);

	           $(".item[data="+ item_id +"]").remove();
	           $('#myModal').modal('hide')
	           $("body").load('/');
	        },
	        error: function (data) {
	            console.log('Error:', data);
	        }
	    });
	});

	//delete task and remove it from list
	$('#item-uom-btn').click(function(e){
		var item_id = $('#itemId').val();
		//console.log(item_id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
            }
        })

        e.preventDefault(); 

        $.ajax({

            type: 'POST',
	        url: url + '/sales/itemUOM' + '/' + item_id,
            success: function (data) {
                console.log(data);
                $("body").load('/');
    	           
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
	});

	//delete task and remove it from list
	$('#item-return-btn').click(function(){
		console.log('wakaa wakaa');

        $.get(url + '/sales/returnItem', function (data) {
	        console.log(data);
         	$("body").load('/');
	    })
	});

	// Priveiw Bill
	$('#bill').click(function(){
	    var item_id = $(this).attr("data");
	  //  console.log(item_id);

	    $.get(url + '/sales/bill', function (data) {
	      // console.log(data);
	       var sum = 0;
	       for (i = 0; i < data.length; i++) { 
	       	 // console.log(data[i].total);
	           sum += parseFloat(data[i].total) ;
	       }

	        $('.bill').html(''); 
	        	console.log(parseFloat(sum));
	        
	       //console.log($('.bill').html('$  ' + parseFloat(sum)));
	        $('.bill').html('$  ' + parseFloat(sum));
	        $('#myBill').modal('show');

	    }) 
	});

	// Generate Bill
	$('#bill-ok-btn').click(function() {

		$.get(url + '/sales/saveOrder', function (data) {
	       console.log(data);
	       $("body").load('/');
	       $('#myBill').modal('hide');
	    }) 
	});

	// Show Transaction history
	$('#transaction-History').click(function(){
	    //var item_id = $(this).attr("data");
	   //  console.log(item_id);

	    // prepare the markup
		var markup = '<table class="table table-hover table-bordered table-condensed" style="font-size:12px;"><thead>';
		markup += '<tr style="background: #3c8dbc;color: white;"><th>Receipt No.</th><th>Total</th><th>Date</th>';
		markup += '<th>Staff Username</th><th></th><th></th></tr></thead><tbody>';



	    $.get(url + '/sales/transactionHistory', function (data) {
	       console.log(data);

    		//var item = '<tr class="item" data="' + data.id + '"><td>' + data.item + '</td><td>' + data.unitPrice + '</td><td>' + data.qty + '</td><td>' + data.total + '</td></tr>';

	      // var sum = 0;
	       for (i = 0; i < data.length; i++) { 

	       	   console.log(data[i].created_at.date);
	       	   //$('#test').text(data[i].total);
	       		markup +='<tr>';
	            markup +='<td>'+ data[i].receiptNo+'</td>';
	            markup +='<td>'+ data[i].total+'</td>';
	            markup +='<td>'+ data[i].created_at.date.substr(0,19)+'</td>';	            
	            markup +='<td>'+ data[i].created_by+'</td>';
	            markup +='<td><button type="button" class="btn btn-primary btn-sm" >Print Copy</button></td>';
	            markup +='<td><a href=url + "/sales/voidTransaction/'+data[i].receiptNo+'" class="btn btn-primary btn-sm" >Void</a></td>';
	       		markup +='</tr>';
	       }


	  	   markup += '</tbody></table>';

	  	   	$('.modal-body').html(markup);
	      //  $('.bill').html('$  ' + sum);
	       $('#transaction-history-modal').modal('show');

	    }) 
	});

	
	// Z-report prompot
	$('#GetZReport').click(function(){

	   var markup = '';
	  // console.log('GetZReport');

	    $.get(url + '/sales/getZReport', function (data) {
			window.open(url + '/', '_blank');
	      // console.log(data);
	       // var sum = 0;
	       for (i = 0; i < data.length; i++) { 
	       	 // console.log(data[i].username);
	           markup += '<option value="'+data[i].username+'">'+data[i].username+'</option>';
	       }

	        $('#GetZReportform').attr('action',url + '/sales/ZReport');
	        $('#usersList').html(markup);
	        $('#GetZReport-modal').modal('show');

	    }) 
	   
	});

	// Purchase reports
	$('#print-purchase-history').click(function () {
		console.log('printPurchaseHistory');
		// printPurchaseHistory
		$.get(url + '/admin/purchase/printPurchaseHistory', function (data) {
	      console.log(data);
	     }) 
	});

});