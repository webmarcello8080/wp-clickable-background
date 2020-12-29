(function(){

    const elementClass = wp_clickable_bg_data.elementClass;

    document.querySelector('.' + elementClass).onclick = function (event) {
        if (event.target !== this)
            return;
        
        const link = wp_clickable_bg_data.link;
        const mode = wp_clickable_bg_data.mode;
        
        switch(mode) {
            case 'same':
                var win = window.open(link, '_self');
                win.focus();
                break;
            case 'tab':
                var win = window.open(link, '_blank');
                win.focus();
                break;
            case 'window':
                var params = [
                    'height='+screen.height,
                    'width='+screen.width,
                    'fullscreen=yes' // only works in IE, but here for completeness
                ].join(',');

                var popup = window.open(link, 'popup_window', params); 
                popup.moveTo(0,0);
                break;
            default:
                var win = window.open(link, '_self');
                win.focus();
        }
    };
}());
