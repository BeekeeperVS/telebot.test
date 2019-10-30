var WebHook = function () {
    return {
        init: init,
    };

    function init() {
        $('.web-hook-active').on('click', function () {
            var $this = $(this);


            var url = $this.data('url');
            $.post(url,function (data) {


                if(data.status){
                    $this.removeClass('btn-error');
                    $this.addClass('btn-success');
                    $this.text('Active');
                } else {
                    $this.removeClass('btn-success');
                    $this.addClass('btn-error');
                    $this.text('Disactive')
                }
            })
        })
    }

}();

WebHook.init();