$(function () {
    $('#side-menu').metisMenu();

    /* Fixed Sidebar*/
    if ($("body").hasClass("fixed-sidebar")) {
        $('#slimscroll').slimScroll({
            height: '100%',
            railOpacity: 0.9
        });
    }
    ;

    $(document).on("click", "#delete", function () {
        var url = $(this).attr("data-url");
        $("#btn-modal-delete").attr("href", url);
    });
    $(document).on("click", "#edit", function () {
        var id = $(this).attr("data-id"), fts = $(this).attr("data-fts");
        $("#fts-edit").val(fts);
        $("#fts-id").val(id);
    });

    $('#checkall').change(function () {
        $('input[type="checkbox"]').prop('checked', $(this).prop('checked'));
    });
    
    $('#delall').submit(function (e){
        e.preventDefault();
        $('#delete-modal').modal('show');
        $('#btn-modal-delete').attr('href', '#');
        $('#btn-modal-delete').click(function (){
            $('#delall')[0].submit();
        });
        
    });
    $('#dtable').DataTable({
        ordering: true,
        searching: false,
        "lengthChange": false,
        "info": false,
        order: [1, 'asc'],
        columnDefs: [
            {targets: 'no-sort', orderable: false}
        ]

    });
    $('#dimgtable').DataTable({
        ordering: false,
        searching: false,
        "lengthChange": false,
        "info": false,
        "pageLength": 6

    });
});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
//Sets the min-height of #page-wrapper to window size
$(window).on("load resize", function () {
    topOffset = 50;
    width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
    if (width < 768) {
        $('div.navbar-collapse').addClass('collapse');
        topOffset = 100; // 2-row-menu
    } else {
        $('div.navbar-collapse').removeClass('collapse');
    }

    height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
    height = height - topOffset;
    if (height < 1)
        height = 1;
    if (height > topOffset) {
        $("#page-wrapper").css("min-height", (height) + "px");
    }
});

