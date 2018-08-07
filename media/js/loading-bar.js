jQuery(function($) {
  
  //Watch all ajax activity
  $(document).ajaxStart(function() {
    
    if ($('#loading-bar').length === 0) {

      $('body').append( $('<div/>').attr('id', 'loading-bar').addClass(_lb.position) );

      /**
       * Random loading bar initial percentage
       */
      _lb.percentage = Math.random() * 30 + 30;
      $("#loading-bar")[_lb.direction](_lb.percentage + "%");

      /**
       * Bump loading percentage between current and 99%
       */
      _lb.interval = setInterval(function() {
        
        _lb.percentage = Math.random() * ( (100-_lb.percentage) / 2 ) + _lb.percentage;
        
        $("#loading-bar")[_lb.direction](_lb.percentage + "%");
        
      }, 500);

    }

  }).ajaxStop(function() {
    
    clearInterval(_lb.interval);
    $("#loading-bar")[_lb.direction]("101%");

    /**
     * Waits until css transition is finished and removes element from the DOM
     */
    setTimeout( function() {
      $("#loading-bar").fadeOut(300, function() {
        $(this).remove();
      });
    }, 300);

  });

});

/**
 * Main object
 */
var _lb = {}

//Default loading bar position
_lb.position  = 'top';
_lb.direction = 'width'

/**
 * Ajax call
 * accepts callback( response )
 */
_lb.get = function( callback ) {

  _lb.loading = true;

  jQuery.ajax({
    url   : this.href,
    success: function(response) {
      _lb.loading = false;
      if ( typeof(callback) === 'function'  )
        callback( response );
    }
  });

}

jQuery(function($) {
  
  $('.btn-action').click(function() {

    switch ( $(this).data('action') ) {

      case 'load':
        _lb.get();
        break;

      case 'position':
        _lb.position  = $(this).data('position');
        _lb.direction = $(this).data('direction');
        $('#section-position h1 small').html( _lb.position );
        break;

    }

  });

});