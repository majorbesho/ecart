// Common JS
document.querySelectorAll('.watch-control, .controls a, .iphone-btn').forEach(control => {
    control.addEventListener('click', e => {
        e.preventDefault()
    })
})
// Write your JavaScript code.
// Cube 
let x = 0
let y = 20
let z = 0
let bool = true
let interval;

const cube = document.querySelector('.cube')

document.querySelector('.top-x-control').addEventListener('click', () => {
    cube.style.transform = `rotateX(${x += 20}deg) rotateY(${y}deg) rotateZ(${z}deg)`
})

document.querySelector('.bottom-x-control').addEventListener('click', () => {
    cube.style.transform = `rotateX(${x -= 20}deg) rotateY(${y}deg) rotateZ(${z}deg)`
})

document.querySelector('.left-y-control').addEventListener('click', () => {
    cube.style.transform = `rotateX(${x}deg) rotateY(${y -= 20}deg) rotateZ(${z}deg) `
})

document.querySelector('.right-y-control').addEventListener('click', () => {
    cube.style.transform = `rotateX(${x}deg) rotateY(${y += 20}deg) rotateZ(${z}deg) `
})

document.querySelector('.top-z-control').addEventListener('click', () => {
    cube.style.transform = `rotateX(${x}deg) rotateY(${y}deg) rotateZ(${z -= 20}deg) `
})

document.querySelector('.bottom-z-control').addEventListener('click', () => {
    cube.style.transform = `rotateX(${x}deg) rotateY(${y}deg) rotateZ(${z += 20}deg) `
})

const playPause = () => {
    if(bool) {
        interval = setInterval(() => {
            cube.style.transform = `rotateX(${x}deg) rotateY(${y++}deg) rotateZ(${z}deg)`
        }, 100)
    } else {
        clearInterval(interval)
    }
}

playPause()

document.querySelector('.controls').addEventListener('mouseover', () => {
    bool = false
    playPause()
})

document.querySelector('.controls').addEventListener('mouseout', () => {
    bool = true
    playPause()
})



   
/**
* Unifies event handling across browsers
*
* - Allows registering and unregistering of event handlers
* - Injects event object and involved DOM element to listener
*
* @author Mark Rolich <mark.rolich@gmail.com>
*/
var Event = function () {
    "use strict";
    this.attach = function (evtName, element, listener, capture) {
        var evt         = '',
            useCapture  = (capture === undefined) ? true : capture,
            handler     = null;

        if (window.addEventListener === undefined) {
            evt = 'on' + evtName;
            handler = function (evt, listener) {
                element.attachEvent(evt, listener);
                return listener;
            };
        } else {
            evt = evtName;
            handler = function (evt, listener, useCapture) {
                element.addEventListener(evt, listener, useCapture);
                return listener;
            };
        }

        return handler.apply(element, [evt, function (ev) {
            var e   = ev || event,
                src = e.srcElement || e.target;

            listener(e, src);
        }, useCapture]);
    };

    this.detach = function (evtName, element, listener, capture) {
        var evt         = '',
            useCapture  = (capture === undefined) ? true : capture;

        if (window.removeEventListener === undefined) {
            evt = 'on' + evtName;
            element.detachEvent(evt, listener);
        } else {
            evt = evtName;
            element.removeEventListener(evt, listener, useCapture);
        }
    };

    this.stop = function (evt) {
        evt.cancelBubble = true;

        if (evt.stopPropagation) {
            evt.stopPropagation();
        }
    };

    this.prevent = function (evt) {
        if (evt.preventDefault) {
            evt.preventDefault();
        } else {
            evt.returnValue = false;
        }
    };
};

// End of Cube 
//js-image-zoom.js 

$(function () {
    $(".xzoom, .xzoom-gallery").xzoom({
        zoomWidth: 600,
       
        tint: "#333",
        Xoffset: 0,
        adaptive: true,
        scroll: false,
    });
});


/**
 * Star rating class
 * @constructor
 */
 function StarRating() {
    this.init();
  };
  
  /**
   * Initialize
   */
  StarRating.prototype.init = function() {
    this.stars = document.querySelectorAll('#rating span');
    for (var i = 0; i < this.stars.length; i++) {
      this.stars[i].setAttribute('data-count', i);
      this.stars[i].addEventListener('mouseenter', this.enterStarListener.bind(this));
    }
    document.querySelector('#rating').addEventListener('mouseleave', this.leaveStarListener.bind(this));
  };
  
  /**
   * This method is fired when a user hovers over a single star
   * @param e
   */
  StarRating.prototype.enterStarListener = function(e) {
    this.fillStarsUpToElement(e.target);
  };
  
  /**
   * This method is fired when the user leaves the #rating element, effectively removing all hover states.
   */
  StarRating.prototype.leaveStarListener = function() {
    this.fillStarsUpToElement(null);
  };
  
  /**
   * Fill the star ratings up to a specific position.
   * @param el
   */
  StarRating.prototype.fillStarsUpToElement = function(el) {
    // Remove all hover states:
    for (var i = 0; i < this.stars.length; i++) {
      if (el == null || this.stars[i].getAttribute('data-count') > el.getAttribute('data-count')) {
        this.stars[i].classList.remove('hover');
      } else {
        this.stars[i].classList.add('hover');
      }
    }
  };
  
  // Run:
  new StarRating();



  $(function(){
    var images=[
        // 'https://images.pexels.com/photos/1558732/pexels-photo-1558732.jpeg',
        // 'https://images.pexels.com/photos/1287075/pexels-photo-1287075.jpeg',
        // 'https://images.pexels.com/photos/326055/pexels-photo-326055.jpeg'
    ];
    setInterval(function(){
        var url =   images[Math.floor(Math.random() * images.length)];
        $("body").css({'background':'url('+url+') no-repeat center center fixed','background-size':'cover cover','body':'100vh'});
    },5000);
     
    $('[data-toggle="tooltip"]').tooltip();
     
});
 
// Form Validation & Ajax Request code below
function formValidate(formId,formMsg){
    var flag    =   0;
    $(formId).find('[data-required]').each(function(){
        if($(this).val()===""){
            $(this).addClass('is-invalid');
            flag    =   1;
        }else{
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
            $(formMsg).html('');
        }
    });
    if(flag==1){
        $(formMsg).html('<div class="text-danger"><i class="fa fa-exclamation-circle"></i> Asterisk fields are mandatory! </div>');
        return false;
    }
     
    $(".overlay").show();
    $(".overlay").html('<div class="text-light"><span class="spinner-grow spinner-grow-sm" role="status"></span> Please wait...!</div>');
    setTimeout(function(){$(".overlay").hide()},800);
    $.ajax({
        type:'POST',
        url:'ajax/action-form.php',
        data:$(formId).serialize(),
        success: function(data){
            setTimeout(function(){$(".overlay").hide()},800);
            var a   =    data.split('|***|');
            if(a[1]==1){
                $(formMsg).html(a[0]);
                if(typeof(a[2]) != "undefined" && a[2] !== null) {
                    setTimeout(function(){window.location.href=""+a[2]},800);
                }
            }else{
                $(formMsg).html(a[0]);
            }
        }
    });
}




/*carousel service slider*/

/* Set rates + misc */
var taxRate = 0.05;
var shippingRate = 0.00; 
var fadeTime = 300;


/* Assign actions */
$('.product-quantity input').change( function() {
  updateQuantity(this);
});

$('.product-removal button').click( function() {
  removeItem(this);
});


/* Recalculate cart */
function recalculateCart()
{
  var subtotal = 0;
  
  /* Sum up row totals */
  $('.product').each(function () {
    subtotal += parseFloat($(this).children('.product-line-price').text());
  });
  
  /* Calculate totals */
  var tax = subtotal * taxRate;
  var shipping = (subtotal > 0 ? shippingRate : 0);
  var total = subtotal + tax + shipping;
  
  /* Update totals display */
  $('.totals-value').fadeOut(fadeTime, function() {
    $('#cart-subtotal').html(subtotal.toFixed(2));
    $('#cart-tax').html(tax.toFixed(2));
    $('#cart-shipping').html(shipping.toFixed(2));
    $('#cart-total').html(total.toFixed(2));
    if(total == 0){
      $('.checkout').fadeOut(fadeTime);
    }else{
      $('.checkout').fadeIn(fadeTime);
    }
    $('.totals-value').fadeIn(fadeTime);
  });
}


/* Update quantity */
function updateQuantity(quantityInput)
{
  /* Calculate line price */
  var productRow = $(quantityInput).parent().parent();
  var price = parseFloat(productRow.children('.product-price').text());
  var quantity = $(quantityInput).val();
  var linePrice = price * quantity;
  
  /* Update line price display and recalc cart totals */
  productRow.children('.product-line-price').each(function () {
    $(this).fadeOut(fadeTime, function() {
      $(this).text(linePrice.toFixed(2));
      recalculateCart();
      $(this).fadeIn(fadeTime);
    });
  });  
}


/* Remove item from cart */
function removeItem(removeButton)
{
  /* Remove row from DOM and recalc cart total */
  var productRow = $(removeButton).parent().parent();
  productRow.slideUp(fadeTime, function() {
    productRow.remove();
    recalculateCart();
  });
}