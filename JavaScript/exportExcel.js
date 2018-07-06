$(function () {
            $(".mytable").on('click','#export',function () {
                $("#account_table").table2excel({
                    filename: "Account_state.xls"
                });
            });
            
            $(".mytable").on('click','.exportcat',function () {
                $("#emp_table").table2excel({
                    filename: "category_list.xls"
                });
            });
            
            $(".mytable").on('click','.exportitem',function () {
                $("#emp_table").table2excel({
                    filename: "category_list.xls"
                });
            });
            
            $(".mytable").on('click','.exportstock',function () {
                $("#emp_table").table2excel({
                    filename: "category_list.xls"
                });
            });
        });