$(function () {
            $(".mytable").on('click','#export',function () {
                $("#account_table").table2excel({
                    filename: "Account_state.xls"
                });
            });
        });