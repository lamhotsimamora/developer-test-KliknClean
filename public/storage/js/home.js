let $report = new Vue({
    el: '#report',
    data: {
        report : null,
        data_report : null
    },
    methods: {
        loadData: function(){
            jnet({
                url : API_URL_GET_REPORT,
                method : 'post',
                data : {
                    _token : _TOKEN_
                }
            }).request($response=>{
                 if ($response){
                     var obj = JSON.parse($response);

                     if (obj){
                        this.data_report = obj.data
                     }
                 }
            })
        },
        loadDataEmployees: function(company_id,company_name){
            jnet({
                url : API_URL_SEARCH_EMPLOYEES,
                method : 'post',
                data : {
                    _token : _TOKEN_,
                    _id : company_id,
                    _name : company_name
                }
            }).request($response=>{
                 if ($response){
                     var obj = JSON.parse($response);

                     if (obj){
                        $modal.data_employees = obj.data
                        $modal.company_name = company_name
                     }
                 }
            })
        }
    },
    mounted() {
        this.loadData();
    }
})

let $modal = new Vue({
    el : '#modal_view_employees',
    data : {
        company_name : null,
        data_employees : null
    },
    methods: {

    }
})
