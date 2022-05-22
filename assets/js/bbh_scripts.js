(function($) {
    // ------ TO TOP -------
    $("#toTop").click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    // ------ SHOW SEARCH -------
    $("#showSearch").click(function(e) {
        e.preventDefault();
        $(".dgwt-wcas-search-wrapp").toggle(500);
    });

    // ------ + and - quantities on product cards -------
    $(document).ready(function($) {
        $('form.wcb2b-quantity').on('click', 'button.plus, button.minus', function() {

            // Get current quantity values
            var qty = $(this).closest('form.wcb2b-quantity').find('.qty');
            var val = parseFloat(qty.val());
            var max = parseFloat(qty.attr('max'));
            var min = parseFloat(qty.attr('min'));

            var step = parseFloat(qty.attr('step'));

            // Change the value if plus or minus
            if ($(this).is('.plus')) {
                if (max && (max <= val)) {
                    qty.val(max);
                } else {
                    qty.val(val + step);
                }
            } else {
                if (min && (min >= val)) {
                    qty.val(min);
                } else if (val > 1) {
                    qty.val(val - step);
                }
            }

        });

    });

})(jQuery)
var $buoop = {
    required: {
        e: 90,
        f: 89,
        o: 74,
        s: 12,
        c: 90
    },
    text: {
        'msg': 'Din webbrowser ({brow_name}) er forældet.',
        'msgmore': 'Opdater din browser og få den bedst mulige oplevelse på dette site.',
        'bupdate': 'Opdater browser',
        'bignore': 'Ignorer',
        'bnever': 'Vis aldrig igen'
    },
    no_permanent_hide: true,
    url: 'https://updatemybrowser.org/',
    api: 2022.05
};

function $buo_f() {
    var e = document.createElement("script");
    e.src = "//browser-update.org/update.min.js";
    document.body.appendChild(e);
};
try {
    document.addEventListener("DOMContentLoaded", $buo_f, false)
} catch (e) {
    window.attachEvent("onload", $buo_f)
}
lazySizes.init(); //fallback if img is above-the-fold