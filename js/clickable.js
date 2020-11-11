(function(){
    document.querySelector(".custom-background").onclick = function (event) {
        console.log(event.target);
        if (event.target !== this)
            return;
        const link =  document.getElementById('wp-clickable-background-link').value;
        const mode =  document.getElementById('wp-clickable-background-mode').value;
        console.log(link);console.log(mode);
        /*
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
        }
*/
    };
}());