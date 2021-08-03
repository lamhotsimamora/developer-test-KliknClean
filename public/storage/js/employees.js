let $employees = new Vue({
    el: '#employees',
    data: {
        data_employees : null,
        total_data : null,
        search_employees_name: null,
        data_btn_number_page : null,
    },
    methods: {
        enterSearchEmployeesName: function(e){
            if (e.keyCode==13){
                this.loadData();
            }
        },
        loadData: function(){
            jnet({
                url : API_URL_GET_EMPLOYEES,
                method : 'post',
                data : {
                    _token : _TOKEN_
                }
            }).request($response=>{
                 if ($response){
                     var obj = JSON.parse($response);

                     if (obj){
                        this.data_employees = obj.data
                        this.total_data = obj.total;
                     }
                 }
            })
        },
    },
    mounted() {
        this.loadData();
    }
})
