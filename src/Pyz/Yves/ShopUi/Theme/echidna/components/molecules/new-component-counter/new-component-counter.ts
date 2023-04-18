import Component from 'ShopUi/models/component';
export default class NewComponentCounter extends Component {
    protected counter: HTMLElement
    protected elements: HTMLElement[]

    protected readyCallback(): void {
        this.counter = <HTMLElement>document.querySelector(`.${this.jsName}__counter`);
        this.elements = <HTMLElement[]>Array.from(document.querySelectorAll(this.elementSelector));
        this.count();
    }

    count(): void {
        this.counter.innerText = `${this.elements.length}`;
    }

    get elementSelector(): string {
        return this.getAttribute('element-selector');
    }
}

$('.countdown').countdown('2023/06/09', function (event: any) {
    $(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
});


// $("#add-to-cart-button").click(function(){
// console.log("add to cart click working");
// $.ajax({
//     url:("/cart"),
//     type:'GET',
//     success: function(data) {
//         var classData = $(data).filter(".list__item cart-summary__item.cart-summary__item--top-space").html();
//         console.log(classData);
//         $('#grand-total-display').append( "Cart Total: " + classData );
//     }
//  });
// });

// $("#add-to-cart-button").click(function(){{
//     searchval = $(".list__item cart-summary__item cart-summary__item--top-space").val();
//     console.log("Toatal:" +" " + searchval);
//     }
// );

// function updateValues() {
//     let price = $("#val-cart").text();
//     $("#top-itemvalue").text(price);
// }

// $(".ajax-add-to-cart__button").click(function() {
//     console.log("Updated via add to cart button");
//     updateValues();
// });

// // call updateValues() on page load to initialize the values
// $(document).ready(function() {
//     console.log("Updated via page load");
//     updateValues();
// });

function updateValues(){
    
}

// $(document).ready(function() {

//     $.get("/subtotal", function(data) {
//         let subtotal = data.CartSubTotal;
//         $("#top-itemvalue").text("Subtotal:"+" "+ subtotal);
//      });

//     $(".ajax-add-to-cart__button").click(function() {
//         $.get("/subtotal", function(data) {
//            var subtotal = data.CartSubTotal;
//            $("#top-itemvalue").text("Subtotal:"+" "+ subtotal);
//         });
//     });

// });

$(document).ready(function() {

    $.get("/get-subtotal", function(data) {
        let subtotal = data.SubTotalAmount;
        var currency = data.CurrencySymbol;
       // $("#top-itemvalue").text("Subtotal:"+" "+ subtotal);
        if (subtotal <= 6000) {
            let remainingAmount = 6000 - subtotal;
            let roundAmount = remainingAmount.toFixed(2);
            $("#remaining-amount").text("Only" + " " + currency+roundAmount + " " + "away for free shipping");
        } else {
            $("#remaining-amount").text("Congrats! You have got free shipping");
        }
     });

    });

    $(".ajax-add-to-cart__button").click(function() {
        $.get("/get-subtotal", function(data) {
           var subtotal = data.SubTotalAmount;
           var currency = data.CurrencySymbol;
           //$("#top-itemvalue").text("Subtotal:"+" "+ subtotal);
           if (subtotal <= 6000) {
                let remainingAmount = 6000 - subtotal;
                let roundAmount = remainingAmount.toFixed(2);
                $("#remaining-amount").text("Only" + " " + currency+roundAmount + " " + "away for free shipping");
            } else {
                $("#remaining-amount").text("Congrats! You have got free shipping");
            }
        });
    });


