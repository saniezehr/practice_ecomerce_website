$(document).ready(function(){
    //increment
    $(document).on('click','.inc',function(){
        let productId =$(this).closest('.qtyBox').find('.productId').val();
        //console.log(productId);//for checking

        let productQty = $(this).closest('.qtyBox').find('.num-product');
        let currentQty = parseInt(productQty.val());

        
        //console.log(currentQty);

        if(!isNaN(currentQty)){
            let updateQty =currentQty;
            productQty.val(updateQty);
            updateIncDec(productId,updateQty);

            //price
            updatedPrice($(this),updateQty);
        }
    })
    
    //decrement

    $(document).on('click','.dec',function(){
        let productId = $(this).closest('.qtyBox').find('.productId').val();
        //console.log(productId);//for checking

        let productQty = $(this).closest('.qtyBox').find('.num-product');
        let currentQty = parseInt(productQty.val());
       // console.log(currentQty);

        if(!isNaN(currentQty) && currentQty > 1){
            let updateQty =currentQty ;
            productQty.val(updateQty);
            updateIncDec(productId,updateQty);
            
            //price
            updatedPrice($(this),updateQty);

        }
    })

function updatedPrice(element,qty){

    let row = $(element).closest('.table_row');
    let price = row.find('.column-3').text();
    let total = price*qty;
    row.find('.column-5').text(total);
    console.log(total)

}

    function updateIncDec(proId,proQty){
        $.ajax({
            url :"shoping-cart.php",
            type:"POST",
            data :{
                "qtyIncDec":true,
                "productId": proId,
                "productQty": proQty

            },
            success : function(response){
                  
            }
        })
    }
})