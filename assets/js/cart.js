$(document).ready(function() {
  $('.add-to-cart').click(function() {
      event.preventDefault();
      var product_id = $(this).attr('data-id');

      $.ajax({
          url: 'index.php?controller=cart&action=add',
          method: 'GET',
          data: {
              product_id: product_id
          },
          success: function(data) {
              console.log(data)
              $('.ajax-message').html('Thêm sản phẩm vào giỏ thành công');
              $('.ajax-message').addClass('ajax-message-active');
  
              setTimeout(function() {
                  $('.ajax-message').removeClass('ajax-message-active');
              }, 3000)
          }
      });
  })
})
